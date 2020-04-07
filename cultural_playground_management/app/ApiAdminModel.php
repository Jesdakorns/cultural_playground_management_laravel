<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ApiAdminModel extends Model
{
    public static function get_users($id)
    {
        $data = DB::select("select * from users where type = 1 and id = '$id'");
        return $data;
    }
    public static function get_all_users()
    {
        $data = DB::select("select * from users where type = 0 ");
        return $data;
    }
    public function post_users(array $data)
    {
        DB::table('users')->insert(
            array('name' => $data['name'] ,'email' => $data['email'], 'password' => $data['password'], 'museum_code' => $data['museum_code'],'type' => $data['type'],'created_at' =>  $data['created_at'], 'updated_at' => $data['updated_at'])
        );
    }
    public static function get_game_id($id)
    {
        $data = DB::select("select * from games where Id = $id");
        return $data;
    }

   public static function delect_game($id)
    {
        $data = DB::delete("delete from games where id = $id");
        return $data;
    }
    public static function get_user_id($id)
    {
        $data = DB::select("select * from users where id = $id");
        return $data;
    }

   public static function delect_user($id)
    {
        $data = DB::delete("delete from users where id = $id");
        return $data;
    }

    public static function get_datamuseum()
    {
        $data = DB::select("select * from datamuseum");
        return $data;
    }
    public static function get_games()
    {
        $data = DB::select("select * from games");
        return $data;
    }
    public static function delect_datamuseum($id)
    {
        $data = DB::delete("delete from datamuseum where Id = $id");
        return $data;
    }
    public static function get_filr_datamuseum($id)
    {
        $data = DB::select("select Url from datamuseum where Id = $id");
        return $data;
    }
    public static function get_games_url($id)
    {
        $data = DB::select("select url from games where id = $id");
        return $data;
    }
}
