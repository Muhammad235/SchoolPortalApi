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

        $createStudent = $student->grade()->create($request->validated());

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

        $user = Student::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'The provided credentials are incorrect',
            ], 401);
        }

        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json([
            'access_token' => $user->createToken($device)->plainTextToken,
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
