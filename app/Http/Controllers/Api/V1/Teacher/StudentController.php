<?php

namespace App\Http\Controllers\APi\V1\Teacher;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Traits\CheckAuthorize;
use App\Http\Controllers\Controller;
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
    // $students = $teacher->students();


    if (!$this->canModifyStudent($requestId, $bearerToken)){

        return $this->error([], 'You are not authorized to make this request', 403);

    }else {

        $students = Student::where('student_class_id', $teacher->student_class_id)->get();

        $studentsResource = StudentResource::collection($students);

        $teacherResource = new TeacherResource($teacher);

        return $this->success([
            'teacher' => $teacherResource,
            'students' => $studentsResource
        ]);
    }

    }
}



