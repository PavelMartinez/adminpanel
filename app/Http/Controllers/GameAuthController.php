<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class GameAuthController extends Controller
{
    public function auth($skey, $nick, $server, $password, $ip)
    {
        if($skey == "amfgkangihiu12iiasfmm")
        {
            $admin = App\Admin::where("nick", $nick)->first();
            if($admin)
            {
                if($admin->password == 255)
                {
                    $admin->password = $password;
                    $admin->save();
                }
                if($password != $admin->password)
                    return "PI|0"; // неверный пароль
                if($server == $admin->server)
                    return $this->SuccessLogin($level, $ip, $server, $nick);
                else {
                    // гостевой сервер
                    if($admin->lastIP != $ip)
                        return "IC|0"; // ip сменился, зовём на основной сервер
                    switch($admin->level)
                    {
                        case 1: return $this->SuccessLogin(1, $ip, $server, $nick);
                        case 2: return $this->SuccessLogin(1, $ip, $server, $nick);
                        case 3: return $this->SuccessLogin(2, $ip, $server, $nick);
                        case 4: return $this->SuccessLogin(2, $ip, $server, $nick);
                        case 5: return $this->SuccessLogin(2, $ip, $server, $nick);
                        case 6: return $this->SuccessLogin(4, $ip, $server, $nick);
                        default: return $this->SuccessLogin($admin->level, $ip, $server, $nick);
                    }
                }
            }
        }
        else {
            return "IK";
        }
    }

    
    private function SuccessLogin($level, $ip, $server, $nick)
    {
        App\Admin::where("nick", $nick)->update(["lastserver" => $server, "lastIP" => $ip, "lastlogin" => date("Y-m-d H:i:s")]);
        return $level;
    }
}
