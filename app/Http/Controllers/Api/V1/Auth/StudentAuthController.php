<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\Student;
use App\Models\StudentClass;
use App\Models\SubjectScore;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\StudentResource;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\StoreStudentRequest;


class StudentAuthController extends Controller
{

    public function register(StoreStudentRequest $request, StudentClass $student)
    {

        //Validate the request
         $validatedData = $request->validated();

        // Create the student and the relationship
        $createStudent = $student->grade()->create($validatedData);

        $createStudent->score()->create(['student_id' => $createStudent->id]);

        if ($createStudent) {

            $studentDetails = new StudentResource($createStudent);

            return response()->json([
                "message" => "Request was successfull",
                'data' => $studentDetails,
                'token' =>  $createStudent->createToken($createStudent->first_name)->plainTextToken
              ], 201);
        }

    }

    public function login(LoginRequest $request)
    {
        $request->validated($request->all());

        $getUser = Student::where('email', $request->email)->first();

        if (!$getUser || !Hash::check($request->password, $getUser->password)) {
            return response()->json([
                'error' => 'The provided credentials are incorrect',
            ], 401);
        }

        $user = new StudentResource($getUser);

        return response()->json([
            "message" => "Request was successfull",
            'data' => $user,
            'token' =>  $getUser->createToken($user->first_name)->plainTextToken
          ], 200);

    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([], 204);

    }

}
