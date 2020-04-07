<?php

namespace App\Http\Controllers\Authorities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;


class AuthoritiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 28-1-63
     * comment: Send data user to view 
     * input: -
     * output: Data the user 
     */
    public function index()
    {
        $ApiController = new ApiController();
        $data = $ApiController->getApiUser();
        return view('authorities.dashboard', compact('data'));
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 28-1-63
     * comment: Send data user to view create dataset
     * input: -
     * output: Data the user 
     */
    public function showFormCreateDataset()
    {
        $ApiController = new ApiController();
        $data = $ApiController->getApiUser();
        return view('authorities.createDataset', compact('data'));
    }

    /**
     * name: Mr.Jesdakorn Saelor
     * date: 28-1-63
     * comment: Send dataset recording status to view create dataset
     * input: game_id, items
     * output: status
     */
    public function storeFormCreatDataset(Request $request)
    {

        $ApiController = new ApiController();
        $result = $ApiController->postApiCreateDataset($request);
        return response()->json(
            $result,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 21-2-63
     * comment: Send data user to view delete dataset
     * input: -
     * output: Data the user 
     */
    public function showFromDeleteDataset()
    {
        $ApiController = new ApiController();
        $data = $ApiController->getApiUser();
        return view('authorities.deleteDataset', compact('data'));
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 21-2-63
     * comment: Send dataset search status to view delete dataset
     * input: gameId
     * output: status and item
     */
    public function storeFormSearchDataset(Request $request)
    {
        $ApiController = new ApiController();
        $result = $ApiController->postApiSearchDataset($request);
        return response()->json(
            $result,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 21-2-63
     * comment: Delete datasets
     * input: dataset_code
     * output: status
     */
    public function destroyFormDeleteDataset(Request $request)
    {
        $ApiController = new ApiController();
        $result = $ApiController->postApiDeleteDataset($request);
        return response()->json(
            $result,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Send data user to view create game
     * input: -
     * output: Data the user 
     */
    public function showFormCreateGame()
    {
        $ApiController = new ApiController();
        $data = $ApiController->getApiUser();
        return view('authorities.createGame', compact('data'));
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Creat game from dataset
     * igameId and dataset_code
     * output: game_url, dataset_code and user_code
     */
    public function storeFormCreateGame(Request $request)
    {
        $ApiController = new ApiController();
        $result = $ApiController->postApiCreatGame($request);
        return response()->json(
            $result,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
}
