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
    public function getCommand(Request $request, string $action)
    {
        $cmService = new CommandService();
        $cmLine = $cmService -> getCommandByDevice($request, $action);

        return $cmLine;
    }
    public function updateCommandByIdAndDevice(Request $request)
    {
        $cmService = new CommandService();
        $cmLine = $cmService -> updateCommandByIdAndDevice($request);

        return $cmLine;
    }
    public function deviceCommand(Request $request, string $action)
    {
        $cmService = new CommandService();
        $cmLine = $cmService -> getCommandByUsernameAndDevice($request, $action);

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
    public function getIftttTriggerByDevice($action)
    {
        $cmService = new CommandService();
        $status = $cmService -> getIftttTriggerByDevice($action);

        return $status;
    }
}
