<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class TypesModel extends Model
{
    public function getTypes()
    {
        return DB::table('events_types')
        ->select(
            'id',
            'type_name',
            'created_at'
        )
        ->latest()
        ->paginate(5);
    }

    public function updateTypes($upDataType, $id)
    {
        DB::table('events_types')
        ->where(['id' => $id])
        ->update([

            'type_name' => $upDataType['type_name'],
            'updated_at' => Carbon::now()

        ]);
    }

    public function deleteType($id)
    {
        DB::table('events_types')
        ->where(['id' => $id])
        ->delete();
    }
}
