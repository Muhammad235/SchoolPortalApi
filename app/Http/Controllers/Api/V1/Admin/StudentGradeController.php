<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentGradeController extends Controller
{

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

           return response()->json([
            "message" => "Request was successfull",
            'data' => $createGrade->grade,
          ], 201);

       }else {

         return response()->json([
            'error' => 'There is an erorr creating the grade',
          ], 500);

       }
    }
}
