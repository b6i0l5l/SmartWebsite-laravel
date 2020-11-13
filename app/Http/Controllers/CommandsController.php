<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommandModels;
use App\Http\Services\CommandService;

class CommandsController extends Controller
{
    public function postCommand(Request $request)
    {
        $cmService = new CommandService();
        $cmLine = $cmService -> postCommandById($request);

        return $cmLine;
    }
    public function getCommand(Request $request, string $device)
    {
        $cmService = new CommandService();
        $cmLine = $cmService -> getCommandByDevice($request, $device);

        return $cmLine;
    }
    public function updateCommandByIdAndDevice(Request $request)
    {
        $cmService = new CommandService();
        $cmLine = $cmService -> updateCommandByIdAndDevice($request);

        return $cmLine;
    }
    public function deviceCommand(Request $request, string $device)
    {
        $cmService = new CommandService();
        $cmLine = $cmService -> getCommandByUsernameAndDevice($request, $device);

        return $cmLine;
    }
    public function getAllCommandsByUser(string $username)
    {
        $cmService = new CommandService();
        $commandModels = $cmService -> getAllCommandModelsByUser($username);

        return $commandModels;
    }
    public function getAllCommandModelsAndDevicesByUser(string $username)
    {
        $cmService = new CommandService();
        $commandModelsAndDevices = $cmService -> getAllCommandModelsAndDevicesByUser($username);

        return $commandModelsAndDevices;
    }
    public function getIftttTriggerByDevice($device)
    {
        $cmService = new CommandService();
        $status = $cmService -> getIftttTriggerByDevice($device);

        return $status;
    }
}
