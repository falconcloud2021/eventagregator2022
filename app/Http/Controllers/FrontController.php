<?php

namespace App\Http\Controllers;

use App\Models\Front;

class FrontController extends Controller
{
    public function index()
    {
        $frontModel = new Front();
        $expenses = $frontModel->getSportEventsList();
        return response()->json($expenses);

    }

    public function eventShowItem($id)
    {
        $frontModel = new Front();
        $expenses = $frontModel->getSportEventByID($id);
        return response()->json($expenses);
    }

    public function eventsSelect()
    {

    }

}
