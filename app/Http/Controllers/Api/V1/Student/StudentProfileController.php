<?php

namespace App\Http\Controllers\APi\V1\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

class StudentProfileController extends Controller
{
    use HttpResponses;

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
}
