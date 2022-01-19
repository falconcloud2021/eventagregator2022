<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogReaderController extends Controller
{
    public function getIndexLogs()
    {
        // return view('LaravelLogReader::index');
        return view('admin/logsindex', [
            'user' => 'admin']);

    }

    public function getLogs(Request $request)
    {
        if ($request->has('date')) {
            return (new LaravelLogReader(['date' => $request->get('date')]))->get();
        } else {
            return (new LaravelLogReader())->get();
        }
    }

    public function postDelete(Request $request)
    {
        if ($request->has('filename')) {
            $file = 'logs/' . $request->get('filename');
            if (File::exists(storage_path($file))) {
                File::delete(storage_path($file));
                return ['success' => true, 'message' => 'Successfully deleted'];
            }
        }
        if ($request->has('clear')) {
            if ($request->get('clear') == true) {
                $files = glob(storage_path('logs/*.log'));

                array_map('unlink', array_filter($files));
                return ['success' => true, 'message' => 'All Successfully deleted'];
            }
        }
    }
}
