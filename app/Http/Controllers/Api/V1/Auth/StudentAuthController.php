<?php

namespace App\Http\Controllers\APi\V1\Auth;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\StudentResource;
use App\Http\Requests\LoginStudentRequest;
use App\Http\Requests\StoreStudentRequest;


class StudentAuthController extends Controller
{
    use HttpResponses;

    public function register(StoreStudentRequest $request, StudentClass $student)
    {

        // $request->validated($request->all());

        // $student = Student::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'gender' => $request->gender,
        //     'class' => $request->class,
        //     'password' => Hash::make($request->password),
        // ]);


        // $studentDetails = new StudentResource($student);

        // return $this->success([
        //     'student' => $studentDetails,
        //     'token' => $student->createToken($student->first_name)->plainTextToken
        // ]);

        $createStudent = $student->grade()->create($request->validated());

        return new StudentResource($createStudent);

    }

    public function login(LoginStudentRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::guard('student')->attempt($request->only(['email', 'password']))) {
            return $this->error("[]", 'Email or password is not correct', 401);
        }

        $student = Student::where('email', $request->email)->first();

        return $this->success([
            "student" => $student,
            "token" => $student->createToken($student->first_name)->plainTextToken,
          ]);
    }

    // public function logout()
    // {
    //     Auth::guard('student')->user()->currentAccessToken()->delete();

    //     return $this->success([
    //         'message' => 'logged out successfully'
    //     ]);
    // }


}
