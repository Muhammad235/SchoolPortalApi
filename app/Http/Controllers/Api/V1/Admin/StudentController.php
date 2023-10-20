<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $allStudent = StudentResource::collection(Student::all());

        $allStudent = Student::paginate();

        return response()->json([
            "message" => "  Request was successfull",
            'data' => $allStudent,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student = new StudentResource($student);

        return response()->json([
            "message" => "  Request was successfull",
            'data' => $student,
        ], 200);
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
