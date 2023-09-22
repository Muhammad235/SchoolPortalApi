<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allTeacher = TeacherResource::collection(Teacher::all());

        return $this->success([
            'teachers' => $allTeacher
        ]);
    }


}
