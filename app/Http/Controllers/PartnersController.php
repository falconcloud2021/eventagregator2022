<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnersController extends Controller
{
    public function partners_list()
    {
        $partnersModel = new Partners();
        $partners = $partnersModel->getPartners();
        return view('admin/partners', [
            'user' => 'admin',
            'partners' => $partners
        ]);
    }
}
