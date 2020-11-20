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
        $commandmodel->action = $request->action;
        $commandmodel->command = $request->command;

        $commandmodel -> save();
        return response()->json($commandmodel);
    }
    protected function getCommand(Request $request, string $action)
    {
        $commandmodel = CommandModels::where([['username', $request['username']],['action', $action]])->first();
        return $commandmodel->toArray();
    }
    protected function updateCommandModelByIdAndDevice(Request $request)
    {
        $commandmodel = CommandModels::where('action',$request->action)
        ->update(['command' => $request->command]);

        return $commandmodel;
    }
    protected function getCommandModelByUsernameAndDevice(Request $request, string $action)
    {
        if($request->has('username')){
            $commandByUsernameAndDevice = CommandModels::where('action', $action)
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
    protected function getAllCommandModelsAndDevicesByUser(string $username)
    {
        $parameterKeys = ['command', 'action', 'device'];

        $commandModelsAndDevices = CommandModels::select($parameterKeys)
        ->where('username', $username)
        ->get();
    
        return $this->commandModelsAndDevicesToArray($commandModelsAndDevices);
    }
    protected function getIftttTriggerByDevice($action)
    {
        $curl = curl_init("https://maker.ifttt.com/trigger/".$action."/with/key/kVOo6YluNonG0f7BVJqa8tNmk3b-QldtTtYSze2nwlY");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_exec($curl);
        
        return ['status' =>'ooooooooooooooooook'];
    }
    private function commandModelsAndDevicesToArray($commandModelsAndDevices)
    {
        $commandModelsAndDevicesToArray = [];
        foreach($commandModelsAndDevices as $commandModelAndDevice)
        {
            array_push($commandModelsAndDevicesToArray, ['command' => $commandModelAndDevice['command'],
                    'action' => $commandModelAndDevice['action'], 'device' => $commandModelAndDevice['device']]);
        }

        return $commandModelsAndDevicesToArray;
    }
}
?>
