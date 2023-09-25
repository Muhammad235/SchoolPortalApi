<?php

namespace App\Http\Controllers\APi\V1\Student;

use App\Models\SubjectScore;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Traits\CheckAuthorize;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResultResource;
use Laravel\Sanctum\PersonalAccessToken;

class StudentResultController extends Controller
{
    use HttpResponses, CheckAuthorize;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allStudentScore = ResultResource::collection(SubjectScore::all());

        return $this->success([
            'results' => $allStudentScore
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, SubjectScore $student)
    {
        // get user id and token id
        $requestId = $student->student_id;
        $bearerToken = $request->bearerToken();

        //compare user id and token id if they match to authorize user
        if (!$this->isNotAuthorize($requestId, $bearerToken)) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $studentResult = new ResultResource($student);

        return $this->success([
            'result' => $studentResult
        ]);

    }
}
