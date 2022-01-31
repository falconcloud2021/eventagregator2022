<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CategoriesModel extends Model
{
    public function getCategories()
    {
        return DB::table('events_categories')
        ->select(
            'id',
            'category_name',
            'category_img',
            'created_at'
        )
        ->latest()
        ->paginate(5);
    }

    public function updateCategories($upDataCatType, $id)
    {
        DB::table('events_categories')
        ->where(['id' => $id])
        ->update([

            'category_name' => $upDataCatType['category_name'],
            'category_img' => $upDataCatType['category_img'],
            'updated_at' => Carbon::now()

        ]);
    }

    public function deleteCategory($id)
    {
        DB::table('events_categories')
        ->where(['id' => $id])
        ->delete();
    }
}
