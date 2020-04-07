<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiAdminController;
use Illuminate\Support\Facades\Hash;
use DB;


class AdminController extends Controller
{
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Send data admin to view dashboard
     * input: -
     * output: Data the admin 
     */
    public function index()
    {
        $ApiAdminController = new ApiAdminController();
        $data = $ApiAdminController->getApiAdmin();
        return view('admin.dashboard', compact('data'));
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Send data admin to view manageMembers
     * input: -
     * output: Data the admin 
     */
    public function showManageMembers()
    {
        $ApiAdminController = new ApiAdminController();
        $data = $ApiAdminController->getApiAdmin();
        return view('admin.manageMembers', compact('data'));
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Send data admin to view manageMembers
     * input: -
     * output: Data the admin 
     */
    public function storeManageMembers(Request $request)
    {
        $ApiAdminController = new ApiAdminController();
        $result = $ApiAdminController->postApiManageMembers($request);
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
     * comment: Send data admin to view manageGames
     * input: -
     * output: Data the admin 
     */
    public function showManageGames()
    {
        $ApiAdminController = new ApiAdminController();
        $data = $ApiAdminController->getApiAdmin();
        return view('admin.manageGames', compact('data'));
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Save games to the database
     * input: game_name and game_address
     * output: status
     */
    public function storeManageGames(Request $request)
    {
        $ApiAdminController = new ApiAdminController();
        $result = $ApiAdminController->postApiManageGames($request);
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
     * comment: Edit game
     * input: edit_game_id, edit_game_name, edit_game_address and edit_id
     * output: status
     */
    public function editManageGames(Request $request)
    {
        $updated_at = date('Y-m-d H:i:s');
        $sql = DB::update("update games set id_game='$request->edit_game_id' ,name='$request->edit_game_name',url='$request->edit_game_address',updated_at='$updated_at' where id =$request->edit_id");
        if ($sql) {
            $response = array(
                'status' => "success"
            );
        } else {
            $response = array(
                'status' => "error"
            );
        }
        return response()->json(
            $response,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Delete game
     * input: game_id
     * output: status
     */
    public function destroyManageGames(Request $request)
    {
        $ApiAdminController = new ApiAdminController();
        $result = $ApiAdminController->postApiDeleteGames($request);
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
     * comment: Edit user
     * input: edit_id, edit_name, edit_email, edit_password and edit_museum_code
     * output: status
     */
    public function editManageUsers(Request $request)
    {
        $updated_at = date('Y-m-d H:i:s');
        $edit_name = $request->edit_name;
        $edit_email = $request->edit_email;
        $edit_password = Hash::make($request->edit_password);
        $edit_museum_code = $request->edit_museum_code;
        $sql = DB::update("update users set name='$edit_name' ,email='$edit_email',password='$edit_password', museum_code='$edit_museum_code',updated_at='$updated_at' where id =$request->edit_id");
        if ($sql) {
            $response = array(
                'status' => "success"
            );
        } else {
            $response = array(
                'status' => "error"
            );
        }
        return response()->json(
            $response,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Delete user
     * input: user_id
     * output: status
     */
    public function destroyManageUsers(Request $request)
    {
        $ApiAdminController = new ApiAdminController();
        $result = $ApiAdminController->postApiDeleteUsers($request);
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
     * comment: Show form register admin
     * input: -
     * output: to view register admin
     */
    public function register()
    {
        return view('auth.register_admin');
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Save admin to the database
     * input: name, email and password
     * output: to view login
     */
    protected function storeRegister(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sql = DB::insert("insert into users (name, email ,password ,created_at,updated_at,type) VALUES ('$name', '$email','$password',' $created_at','$updated_at','1')");
        return redirect('login');
    }
}
