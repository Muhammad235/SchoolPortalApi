<?php

namespace App\Http\Controllers\APi\V1\Auth;

use App\Models\Student;
use App\Models\StudentClass;
use App\Models\SubjectScore;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Traits\CheckAuthorize;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\StudentResource;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\StoreStudentRequest;


class StudentAuthController extends Controller
{
    use HttpResponses, CheckAuthorize;

    public function register(StoreStudentRequest $request, StudentClass $student)
    {


        // $request->validated($request->all());


        // $createStudent = $student->grade()->create(['student_class_id', $student->id]);

            // Validate the request
            $validatedData = $request->validated();

             // Hash the password
            $validatedData['password'] = Hash::make($request->password);

            // Create the student and the relationship
            $createStudent = $student->grade()->create($validatedData);


        // $createStudent = Student::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'address' => $request->address,
        //     'gender' => $request->gender,
        //     // 'student_class_id' => $student->id,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->input('password')),
        // ]);


        $createStudent->score()->create(['student_id' => $createStudent->id]);

        if ($createStudent) {

            $studentDetails = new StudentResource($createStudent);

            return $this->success([
                'student' => $studentDetails,
               $createStudent->createToken($createStudent->first_name)->plainTextToken
            ]);

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

        return $this->success([
            'teacher' => $teacher,
            'token' => $getUser->createToken($user->first_name)->plainTextToken
        ]);

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
