<?php

namespace App\Traits;
use App\Models\Teacher;
use App\Traits\HttpResponses;
use Laravel\Sanctum\PersonalAccessToken;

trait CheckAuthorize{

    use HttpResponses;

    public function isNotAuthorize($requestId, $bearerToken): bool{

        $getUser = PersonalAccessToken::findToken($bearerToken);

        $userId = $getUser->tokenable->id;

        // return "$userId == $requestId";
        if ($requestId !== $userId){
            return false;
        }
        return true;
    }

    public function canModifyStudent($requestId, $bearerToken){

        $getUser = PersonalAccessToken::findToken($bearerToken);
        $userId = $getUser->tokenable->id;

        $findTeacherById = Teacher::find($userId);


        if ($findTeacherById) {

           $getTeacherClass = $findTeacherById->student_class_id;

           if ($getTeacherClass !== $requestId) {

             return false;

           }

           return true;
        }

    }
}
