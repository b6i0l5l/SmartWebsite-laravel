<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModels;
use App\Http\Services\UserService;

class UsersController extends Controller
{
    public function postNewUsernamePassword(Request $request)
    {
        $userService = new UserService();
        $newUsernamePassword = $userService -> postNewUsernamePasswordService($request);
    }
    public function checkUsernamePassword(Request $request)
    {
        $userService = new UserService();
        $checkUsernamePassword = $userService -> checkUsernamePasswordService($request);
        
        return $checkUsernamePassword;
    }
}
