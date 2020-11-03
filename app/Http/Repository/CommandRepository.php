<?php
namespace App\Http\Repository;

use Illuminate\Http\Request;
use App\Models\CommandModels;

class CommandRepository
{
    protected function postCommand(Request $request)
    {

        $commandmodel = new CommandModels;
        $commandmodel->id = $request->id;
        $commandmodel->device = $request->device;
        $commandmodel->command = $request->command;

        $commandmodel -> save();
        return response()->json($commandmodel);
    }
    protected function getCommand(Request $request, string $device)
    {
        $commandmodel = CommandModels::where([['username',$request['username']],['device', $device]])->first();
        return $commandmodel->toArray();
    }
    protected function updateCommandModelByIdAndDevice(Request $request)
    {
        $commandmodel = CommandModels::where('device',$request->device)
        ->update(['command' => $request->command]);

        return $commandmodel;
    }
    protected function getCommandModelByUsernameAndDevice(Request $request, string $device)
    {
        if($request->has('username')){
            $commandByUsernameAndDevice = CommandModels::where('device', $device)
            ->where('username', $request['username'])
            ->get();
            
            return $commandByUsernameAndDevice->toArray();
        }
        
        return null;
    }
    protected function getAllCommandModelsByUser(string $username)
    {
        $commandModels = CommandModels::select('command')
        ->where('username', $username)
        ->get();

        $commandModelsToArray = [];
        foreach($commandModels as $commandModel)
        {
            array_push($commandModelsToArray, $commandModel['command']);
        }
        
        return $commandModelsToArray;
    }
}
?>
