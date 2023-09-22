<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentGradeController extends Controller
{
    use HttpResponses;

    public function store(Request $request)
    {
        $rules = [
            'grade' => 'required|string| unique:student_classes'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()], 400);

        }

       $createGrade =  StudentClass::create(['grade' => $request->grade]);

       if ($createGrade) {
           return $this->success([
            'data' => $request->grade
           ]);
       }else {
        return $this->error([], [
            'error' => 'There is an erorr creating the grade',
         ], 500);
       }
    }
}
