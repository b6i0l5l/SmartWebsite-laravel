<?php
namespace App\Http\Services;

use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;

class UserService extends UserRepository
{
    public function postNewUsernamePasswordService(Request $request)
    {
        $userRepository = new UserRepository();
        $newUser = $userRepository -> postNewUsernamePasswordModel($request);
    }
    public function checkUsernamePasswordService(Request $request)
    {
        $userRepository = new UserRepository();
        $user = $userRepository -> checkUsernamePasswordModel($request);

        return $user;
    }
}

?>