<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ApiAdminModel;
use DB;
use Illuminate\Support\Facades\Hash;



class ApiAdminController extends Controller
{
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: The function used in pull api
     * input: url
     * output: data
     */
    public function getApi($url)
    {
        $json_url = $url . env('BITCOINDE_APIKEY') . "/rate.json";
        $json = file_get_contents($json_url);
        $object = json_decode($json);
        $result = $object;
        return  $result;
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: get data the museum
     * input: -
     * output: museum_code and museum_name
     */
    public function getApiMuseum()
    {
        $url = "https://www.navanurak.in.th/museum_api/main_museums.php";
        $data_url = $this->getApi($url);
        $data[] = array(
            'museum_code' => '0',
            'museum_name' => '-- เลือกพิพิธพัน --'
        );
        foreach ($data_url as $data_url) {
            $data[] = array(
                'museum_code' => $data_url->museum_code,
                'museum_name' => $data_url->museum_name
            );
        }
        return $data;
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: get data the admin
     * input: -
     * output: name, email and image
     */
    public function getApiAdmin()
    {
        $sql = ApiAdminModel::get_users(Auth::user()->id);
        foreach ($sql as $sql) {
            $data = array(
                'name' => $sql->name,
                'email' => $sql->email,
                'image' => $sql->image
            );
        }
        return $data;
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: get data the users
     * input: -
     * output: sequence, id, museum, email, image and password
     */
    public function getApiUsers()
    {
        $url = "https://www.navanurak.in.th/museum_api/main_museums.php";
        $data_url = $this->getApi($url);
        $sequence = 1;
        $sql = ApiAdminModel::get_all_users();

        foreach ($sql as $sql) {
            foreach ($data_url as $data_url) {
                if ($sql->museum_code == $data_url->museum_code) {
                    $data[] = array(
                        'sequence' =>  $sequence,
                        'id' => $sql->id,
                        'museum' => $data_url->museum_code . ": " . $data_url->museum_name,
                        'email' => $sql->email,
                        'image' => $data_url->thumbnail,
                        'password' => $sql->password
                    );
                    $sequence++;
                }
            }
        }

        $result = $data;
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
     * comment: Save members to the database
     * input: -
     * output: status
     */
    public function postApiManageMembers(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $museum_code = $request->museum_code;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sql = DB::insert("insert into users (museum_code, name, email ,password ,created_at,updated_at,type) VALUES ('$museum_code','$name', '$email','$password',' $created_at','$updated_at','0')");
        if ($sql) {
            $response = array(
                'status' => "success"
            );
        }
        return $response;
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: get data the games
     * input: -
     * output: sequence, id, game_id, game_name and game_url
     */
    public function getApiGames()
    {
        $sequence = 1;
        $sql = ApiAdminModel::get_games();
        foreach ($sql as $sql) {
            $data[] = array(
                'sequence' => $sequence,
                'id' => $sql->id,
                'game_id' => $sql->id_game,
                'game_name' => $sql->name,
                'game_url' => $sql->url
            );
            $sequence++;
        }
        return response()->json(
            $data,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Save games to the database
     * input: game_name and game_address
     * output: status
     */
    public function postApiManageGames(Request $request)
    {
        $game_name = $request->game_name;
        $game_address = $request->game_address;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sql = DB::insert("insert into games (name, url ,created_at,updated_at) VALUES ('$game_name','$game_address',' $created_at','$updated_at')");
        if ($sql) {
            $response = array(
                'status' => "success"
            );
        }
        return $response;
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Get game data in the editing section
     * input: id
     * output: id, game_id, game_name and game_url
     */
    public function getDataGame($id)
    {
        $sql = ApiAdminModel::get_game_id($id);
        foreach ($sql as $sql) {
            $data = array(
                'id' => $sql->id,
                'game_id' => $sql->id_game,
                'game_name' => $sql->name,
                'game_url' => $sql->url
            );
        }
        return response()->json(
            $data,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Get user data in the editing section
     * input: id
     * output: id, name, email, password and museum
     */
    public function getDataUser($id)
    {
        $sql = ApiAdminModel::get_user_id($id);
        foreach ($sql as $sql) {
            $data = array(
                'id' => $sql->id,
                'name' => $sql->name,
                'email' => $sql->email,
                'password' => $sql->password,
                'museum' => $sql->museum_code
            );
        }
        return response()->json(
            $data,
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
    public function postApiDeleteGames(Request $request)
    {
        $sql = ApiAdminModel::delect_game($request->game_id);
        if ($sql) {
            $response = array(
                'status' => "success"
            );
        }
        return $response;
    }
    /**
     * name: Mr.Jesdakorn Saelor
     * date: 24-2-63
     * comment: Delete user
     * input: user_id
     * output: status
     */
    public function postApiDeleteUsers(Request $request)
    {
        $sql = ApiAdminModel::delect_user($request->user_id);
        if ($sql) {
            $response = array(
                'status' => "success"
            );
        }
        return $response;
    }
}
