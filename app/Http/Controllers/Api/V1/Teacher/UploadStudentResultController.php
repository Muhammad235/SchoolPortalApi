<?php

namespace App\Http\Controllers\Api\V1\Teacher;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ResultResource;
use App\Http\Requests\StudentScoreRequest;

class UploadStudentResultController extends Controller
{
    public function update(StudentScoreRequest $request, Student $student)
    {

        $teacherClass = Auth::user()->student_class_id;

        $studentclass = $student->student_class_id;

        if ($teacherClass !== $studentclass) {
                return response()->json([
                 'error' => 'You can not access this student, authorized teacher can only access their class student',
            ], 403);
        }

        $updateScore = $student->score()->update([
            "mathematics" => $request->mathematics,
            "english" => $request->english,
            "biology" => $request->biology,
            "civic" => $request->civic,
            "physics" => $request->physics,
            "chemistry" => $request->chemistry,
            "arabic" => $request->arabic,
            "health_education" => $request->health_education,
        ]);

        if ($updateScore) {

            $scoreResource = new ResultResource($student->score);

            return response()->json([
                'message' => 'Request was successfull',
                'data' => $scoreResource,
            ], 200);

        } else {
            return response()->json([
                'error' => 'Failed to update scores',
            ], 500);
        }

    }
}
