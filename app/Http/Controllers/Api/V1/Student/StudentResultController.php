<?php

namespace App\Http\Controllers\APi\V1\Student;

use App\Models\SubjectScore;
use Illuminate\Http\Request;
use App\Traits\CheckAuthorize;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ResultResource;
use Laravel\Sanctum\PersonalAccessToken;

class StudentResultController extends Controller
{
    use  CheckAuthorize;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allStudentScore = ResultResource::collection(SubjectScore::all());

        return response()->json([
            'message' => 'Request was successfull',
            'data' =>  $allStudentScore
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, SubjectScore $student)
    {
        //get user id and token id
        $requestId = $student->student_id;
        $bearerToken = $request->bearerToken();

        // dd($requestId, auth()->id());

        //compare user id and token id if they match to authorize user
        if (!$this->isNotAuthorize($requestId, $bearerToken)) {
            return response()->json([
                'error' => 'You are not authorized to make this request',
            ], 403);
        }

        // $userId = Auth::user()->id;
        // $requestId = $student->student_id;
        // $adminUsername = Auth::user()->username;

        // if ($userId !== $requestId && $adminUsername !== 'admin') {
        //     return response()->json([
        //         'error' => 'You are not authorized to make this request',
        //     ], 403);
        // }

        // dd($student);

        $studentResult = new ResultResource($student);

        return response()->json([
            'message' => 'Request was successfull',
            'data' =>  $studentResult
        ], 200);
    }
}
