<?php

namespace App\Http\Controllers;

use App\Http\Requests\Parser\UpdateRequest;
use App\Models\Parser;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ParserController extends Controller
{
    public function index(): View
    {
        $parsed = Parser::all();
        return view('admin.parser.index', compact('parsed'));
    }

    public function edit(Parser $parser): View
    {
        return view('admin.parser.edit', compact('parser'));
    }

    public function destroy(Parser $parser): RedirectResponse
    {
        $parser->delete();
        return redirect()->route('parser.index');
    }

    public function update(UpdateRequest $request, Parser $parser): RedirectResponse
    {
        $data = $request->validated();
        $parser->update($data);
        return redirect()->route('parser.index');
    }
}
