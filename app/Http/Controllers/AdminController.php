<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Users;
use App\Models\Partners;
use App\Models\Widgets;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard', [
            'user' => 'admin']);
    }

    public function charts_list()
    {
        return view('admin/charts', [
            'user' => 'admin']);
    }

    public function widgets_list()
    {
        $widgetsModel = new Widgets();
        $widgets = $widgetsModel->getWidgets();
        return view('admin/widgets', [
            'user' => 'admin',
            'widgets' => $widgets
        ]);
    }

    public function users_list()
    {
        $usersModel = new Users();
        $users = $usersModel->getUsers();
        return view('admin/users', [
            'user' => 'admin',
            'users' => $users
        ]);
    }

    public function organizer()
    {
        return view('admin/organizer', [
            'user' => 'admin']);
    }

    public function dashboard2()
    {
        return view('admin/dashboard2', [
            'user' => 'admin']);
    }

    public function bells_list()
    {
        return view('admin/bells', [
            'user' => 'admin']);
    }

    public function logsMonitor()
    {
        return view('admin/logsmonitor', [
            'user' => 'admin']);
    }
}
