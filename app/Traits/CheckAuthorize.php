<?php

namespace App\Traits;
use Laravel\Sanctum\PersonalAccessToken;

trait CheckAuthorize{

    public function isNotAuthorize($requestId, $bearerToken): bool{

        $getUser = PersonalAccessToken::findToken($bearerToken);

        $userId = $getUser->tokenable->id;

        // return "$userId == $requestId";
        if ($requestId !== $userId){
            return false;
        }
        return true;
    }
}
