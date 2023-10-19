<?php

namespace App\Http\Controllers\APi\V1\Teacher;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Traits\CheckAuthorize;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResultResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;

class StudentController extends Controller
{
    use CheckAuthorize;

    public function index(Request $request, Teacher $teacher)
    {

    //get teacher id and token id
    $requestId = $teacher->student_class_id;
    $bearerToken = $request->bearerToken();

    // Use the 'students' relationship to get all students associated with the teacher
    $students = $teacher->students();

        if (!$this->canModifyStudent($requestId, $bearerToken)){

            return response()->json([
                'error' => 'You are not authorized to make this request',
            ], 403);

        }else {

            $students = Student::where('student_class_id', $teacher->student_class_id)->get();

            $studentsResource = StudentResource::collection($students);

            $teacherResource = new TeacherResource($teacher);

            return response()->json([
                'message' => 'Request was successfull',
                'teacher' => $teacherResource,
                'students' => $studentsResource,
            ], 200);
        }

    }


    public function show(Request $request, Teacher $teacher, Student $student)
    {

        $studentClass = $student->student_class_id;
        $teacherClass = $teacher->student_class_id;

        //get teacher id and token id
        $requestId = $teacher->student_class_id;
        $bearerToken = $request->bearerToken();

        if (!$this->canModifyStudent($requestId, $bearerToken)){

            return response()->json([
                'error' => 'You are not authorized to make this request',
            ], 403);

        }else {

           if ($studentClass !== $teacherClass) {
                return response()->json([
                    'error' => 'You are not authorized to make this request',
                ], 403);
           }

            $getStudentResult = $student->score()->first();

            $studentResult = new ResultResource($getStudentResult);

            return response()->json([
                'message' => 'Request was successfull',
                'data' => $studentResult
            ], 200);
        }

    }

    public function update(Request $request, Student $student)
    {
        // dd($student->score()->first());
    }


}



