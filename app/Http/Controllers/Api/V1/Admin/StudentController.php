<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    use HttpResponses, CheckAuthorize;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allStudent = StudentResource::collection(Student::all());

        return $this->success([
            'students' => $allStudent
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student = new StudentResource($student);

        return $this->success([
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
