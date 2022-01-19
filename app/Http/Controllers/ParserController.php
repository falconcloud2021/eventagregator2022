<?php

namespace App\Http\Controllers;

use App\Models\Parser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function parsedDataList()
    {
        $parsedModel = new Parser();
        $parsed = $parsedModel->getParsedData();
        return view('admin/parser', [
            'user' => 'admin',
            'parsed' => $parsed
        ]);
    }

    public function parseShowItem($id)
    {
        $parsedModel = new Parser();
        $parse = $parsedModel->getParsedDataByID($id);
        return view('parsed/parse', [
            'user' => 'admin',
            'parse' => $parse
        ]);
    }
}
