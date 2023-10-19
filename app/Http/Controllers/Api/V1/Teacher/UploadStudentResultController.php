<?php

namespace App\Http\Controllers\Api\V1\Teacher;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResultResource;

class UploadStudentResultController extends Controller
{
    public function update(Request $request, Student $student)
    {


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
