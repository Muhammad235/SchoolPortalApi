<?php

namespace App\Traits;
use App\Models\Admin;
use App\Models\Teacher;
use Laravel\Sanctum\PersonalAccessToken;

trait CheckAuthorize{

    public function isNotAuthorize($requestId, $bearerToken): bool{

        $userId = auth()->id();

        if ($requestId !== $userId){
            return false;
        }
        
        return true;
    }


    public function canModifyStudent($requestId, $bearerToken) {
        $getUser = PersonalAccessToken::findToken($bearerToken);
    
        if (!$getUser || !$getUser->tokenable) {
            return false; // Handle the case where the user cannot be found.
        }
    
        $user = $getUser->tokenable;
    
        if (!($user instanceof Teacher) || ($user->student_class_id !== $requestId)) {
            return false;
        }
    
        if ($user instanceof Admin && $user->username !== "admin") {
            return false;
        }
    
        return true;
    }
    


}
