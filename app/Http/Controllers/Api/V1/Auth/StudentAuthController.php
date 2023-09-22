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


        $createStudent = $student->grade()->create($request->validated());

        $studentDetails = new StudentResource($createStudent);


        return $this->success([
            'student' => $studentDetails,
            'token' => $createStudent->createToken($createStudent->first_name)->plainTextToken
        ]);

    }

    public function login(LoginStudentRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::guard('student')->attempt($request->only(['email', 'password']))) {
            return $this->error("[]", 'Email or password is not correct', 401);
        }

        // try {
        //     // Attempt to authenticate the student
        //     if (Auth::guard('student')->attempt($request->only(['email', 'password']))) {
        //         // Authentication succeeded, retrieve the user's current access token
        //         $accessToken = Auth::guard('student')->user()->currentAccessToken();

        //         // You can now work with $accessToken as needed
        //         dd($accessToken);
        //     } else {
        //         // Authentication failed
        //         // Handle the case where the credentials are incorrect
        //         return response()->json(['error' => 'Email or password is not correct'], 401);
        //     }
        // } catch (Throwable $th) {
        //     // Handle any exceptions that may occur
        //     throw $th;
        // }


        // $student = Student::where('email', $request->email)->first();

        // return $this->success([
        //     "student" => $student,
        //     "token" => $student->createToken($student->first_name)->plainTextToken,
        //   ]);
    }

    // public function logout()
    // {
    //     Auth::guard('student')->user()->currentAccessToken()->delete();

    //     return $this->success([
    //         'message' => 'logged out successfully'
    //     ]);
    // }


}
