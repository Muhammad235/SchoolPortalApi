<?php

namespace App\Http\Controllers\APi\V1\Auth;

use App\Models\Teacher;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Http\Requests\StoreTeacherRequest;

class TeacherAuthController extends Controller
{
    use HttpResponses;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request, StudentClass $class_to_teach)
    {

        // Check if the class already has a teacher
        if ($class_to_teach->teacher_class) {

            return $this->error([], [
                'errors' => 'A teacher is taking this class',
             ], 500);

        } else {
            // if the class doesn't have a teacher yet, so create a new the teacher and assign the class

           $createTeacher =  $class_to_teach->teacher_class()->create($request->validated());

           $TeacherDetails = new TeacherResource($createTeacher);

        }

        return $this->success([
            'teacher' => $TeacherDetails,
            'token' => $createTeacher->createToken($createTeacher->first_name)->plainTextToken
        ]);

    }

}
