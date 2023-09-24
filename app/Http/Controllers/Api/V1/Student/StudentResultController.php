<?php

namespace App\Http\Controllers\APi\V1\Student;

use App\Models\Student;
use App\Models\SubjectScore;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResultResource;

class StudentResultController extends Controller
{
    use HttpResponses;

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
    public function show(SubjectScore $student)
    {
        $studentResult = new ResultResource($student);

        return $this->success([
            'result' => $studentResult
        ]);

    }
}
