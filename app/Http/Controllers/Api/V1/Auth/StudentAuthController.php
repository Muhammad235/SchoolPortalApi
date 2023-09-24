<?php

namespace App\Http\Controllers\APi\V1\Auth;

use App\Models\Student;
use App\Models\StudentClass;
use App\Models\SubjectScore;
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

        $createStudent = $student->grade()->create($request->validated());

        $createStudent->score()->create(['student_id' => $createStudent->id]);

        if ($createStudent) {

            $studentDetails = new StudentResource($createStudent);

            return $this->success([
                'student' => $studentDetails,
                'token' => $createStudent->createToken($createStudent->first_name)->plainTextToken
            ]);
        }

    }

    public function login(LoginStudentRequest $request)
    {
        $request->validated($request->all());

        // dd(Auth::guard('student')->user()->id);

        // if (!Auth::guard('student')->attempt($request->only(['email', 'password']))) {
        //     return $this->error("[]", 'Email or password is not correct', 401);
        // }

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

    // private function isNotAuthorize($task){

    //     if (Auth::user()->id !== $task->user_id) {
    //         return $this->error('', 'You are not authorized to make this request', 403);
    //     }
    // }


}
