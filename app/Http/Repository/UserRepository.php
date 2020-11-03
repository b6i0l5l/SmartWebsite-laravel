<?php
namespace App\Http\Repository;

use Illuminate\Http\Request;
use App\Models\UserModels;

class UserRepository
{
    protected function postNewUsernamePasswordModel(Request $request)
    {
        $userModel = new UserModels;
        $userModel->username = $request->username;
        $userModel->password = password_hash($request->password, PASSWORD_DEFAULT);

        $userModel -> save();
    }

    protected function checkUsernamePasswordModel(Request $request)
    {
        $user = UserModels::where([['username', $request['username']], ['password', $request['password']]])->first();
        if($user == null){
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check your username & password']);
        };

        return response()->json(['success'=>true, 'message' => 'success', 'username'=>$request->username]);
    }

}
?>
