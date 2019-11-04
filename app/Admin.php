<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public static function admin_up($id)
    {
        $admin = Admin::find($id);
        $admin->level += 1;
        $admin->save();
    }

    public static function admin_down($id)
    {
        $admin = Admin::find($id);
        $admin->level -= 1;
        $admin->save();  
    }

    public static function admin_del($id)
    {
        $admin = Admin::find($id)->delete();
    }

    public static function admin_add($validated)
    {
        $admin = new Admin();
        $admin->nick = $validated["nick"];
        $admin->level = $validated["level"];
        $admin->server = $validated["server"];
        $admin->lastserver = $validated["server"];
        $admin->password = 255;
        $admin->lastlogin = date("Y-m-d H:i:s");
        $admin->save();
    }
}
