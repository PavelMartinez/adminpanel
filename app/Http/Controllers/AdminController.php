<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;


class AdminController extends Controller
{
    //
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
    }

    public function index($result = null)
    {
        $admins = App\Admin::all();
        return view('home', compact('admins', 'result'));
    }

    public function up($id)
    {
        App\Admin::admin_up($id);
        return redirect("home");
    }

    public function down($id)
    {
        App\Admin::admin_down($id);
        return redirect("home");
    }

    public function del($id)
    {
        App\Admin::admin_del($id);
        return redirect("home");
    }

    public function add()
    {
        return view('addadmin');
    }

    public function new(Request $request)
    {
        $validated = $this->validate($request, [
            'nick' => "required|max:255|min:3|unique:admins",
            'level' => "required|integer",
            'server' => "required|integer"
        ]);
        App\Admin::admin_add($validated);
        return redirect("home");
    }
}
