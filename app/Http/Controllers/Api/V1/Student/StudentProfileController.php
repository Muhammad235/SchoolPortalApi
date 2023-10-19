<?php

namespace App\Http\Controllers\APi\V1\Student;


use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\CheckAuthorize;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentProfileController extends Controller
{
    use CheckAuthorize;

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Student $student)
    {

        //get user id and token id
        $requestId = $student->id;
        $bearerToken = $request->bearerToken();

        //compare user id and token id if they match to authorize user
        if (!$this->isNotAuthorize($requestId, $bearerToken)) {

            return response()->json([
                'error' => 'You are not authorized to make this request',
            ], 403);
        }

        $student = new StudentResource($student);

        return response()->json([
            'message' => 'Request was successfull',
            'data' =>  $student
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //get user id and token id
        $requestId = $student->id;
        $bearerToken = $request->bearerToken();

        //compare user id and token id if they match to authorize user
        if (!$this->isNotAuthorize($requestId, $bearerToken)) {
            return response()->json([
                'error' => 'You are not authorized to make this request',
            ], 403);
        }

        $student->update($request->all());

        $student = new StudentResource($student);

        return response()->json([
            'data' =>  $student
        ], 200);

    }

}
