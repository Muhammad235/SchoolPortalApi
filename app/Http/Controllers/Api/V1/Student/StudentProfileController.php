<?php

namespace App\Http\Controllers\APi\V1\Student;


use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Traits\CheckAuthorize;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentProfileController extends Controller
{
    use HttpResponses, CheckAuthorize;

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
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $student = new StudentResource($student);

        return $this->success([
            'student' => $student
        ]);
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
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $student->update($request->all());

        $student = new StudentResource($student);

        return $this->success([
            'student' => $student
        ]);

    }




}
