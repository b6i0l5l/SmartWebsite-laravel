<?php
namespace App\Http\Services;

use App\Http\Repository\CommandRepository;
use Illuminate\Http\Request;

class CommandService extends CommandRepository
{
    public function postCommandById(Request $request)
    {
        $cmRepository = new CommandRepository();
        $cmLine = $cmRepository -> postCommand($request);

        return $cmLine;
    }
    public function getCommandByDevice(Request $request, string $device)
    {
        $cmRepository = new CommandRepository();
        $cmLine = $cmRepository -> getCommand($request, $device);

        return $cmLine;
    }
    public function updateCommandByIdAndDevice(Request $request)
    {
        $cmRepository = new CommandRepository();
        $cmLine = $cmRepository -> updateCommandModelByIdAndDevice($request);

        return $cmLine;
    }
    public function getCommandByUsernameAndDevice(Request $request, string $device)
    {
        $cmRepository = new CommandRepository();
        $cmLine = $cmRepository -> getCommandModelByUsernameAndDevice($request, $device);

        return $cmLine;
    }
    public function getAllCommandModelsByUser(string $username)
    {
        $cmRepository = new CommandRepository();
        $commandModels = $cmRepository -> getAllCommandModelsByUser($username);

        return $commandModels;
    }
    public function getAllCommandModelsAndDevicesByUser(string $username)
    {
        $cmRepository = new CommandRepository();
        $commandModelsAndDevices = $cmRepository -> getAllCommandModelsAndDevicesByUser($username);

        return $commandModelsAndDevices;
    }
}

?>