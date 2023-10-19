<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allTeacher = TeacherResource::collection(Teacher::all());

        return response()->json([
            "message" => "Request was successfull",
            'data' => $allTeacher,
          ], 200);

    }


}
