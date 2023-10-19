<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\Teacher;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TeacherResource;
use App\Http\Requests\StoreTeacherRequest;

class TeacherAuthController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request, StudentClass $class_to_teach)
    {

        // Check if the class already has a teacher
        if ($class_to_teach->teacher_class) {

             return response()->json([
                'errors' => 'A teacher is taking this class',
            ], 403);

        } else {

          $request->validated($request->all());

           //if the class doesn't have a teacher yet, create a new the teacher and assign the class
           $createTeacher = Teacher::create([
                'student_class_id' => $class_to_teach->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->input('password')),
            ]);

           $TeacherDetails = new TeacherResource($createTeacher);

        }

        return response()->json([
            'message' => 'Request was successfull',
            'data' => $TeacherDetails,
            'token' => $createTeacher->createToken($createTeacher->first_name)->plainTextToken
        ], 201);

    }

    public function login(LoginRequest $request){

        $request->validated($request->all());

        $getTeacher = Teacher::where('email', $request->email)->first();

        if (!$getTeacher || !Hash::check($request->password, $getTeacher->password)) {
            return response()->json([
                'error' => 'The provided credentials are incorrect',
            ], 401);
        }

        $teacher =  new TeacherResource($getTeacher);

        return response()->json([
            'message' => 'Request was successfull',
            'data' => $teacher,
            'token' => $getTeacher->createToken($getTeacher->first_name)->plainTextToken
        ], 200);

        return response()->json([
            'message' => 'Request was successfull',
            'data' => $teacher,
            'token' => $getTeacher->createToken($getTeacher->first_name)->plainTextToken
        ]);
    }


    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([], 204);

    }

}
