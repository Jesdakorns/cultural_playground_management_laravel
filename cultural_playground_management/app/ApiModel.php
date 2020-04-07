<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ApiModel extends Model
{
    public static function get_users()
    {
        $data = DB::select("select * from users");
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
