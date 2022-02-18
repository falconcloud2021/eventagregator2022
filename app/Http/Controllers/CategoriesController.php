<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\Events;
use App\Models\TypesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function showCategoriesTypes()
    {
        $user = Auth::user();
        $categoriesData = new CategoriesModel();
        $categories = $categoriesData->getCategories();
        $typesData = new TypesModel();
        $types = $typesData->getTypes();
        $events = Events::paginate(5);
        return view('events/categoryType', [
            'user' => $user,
            'events' => $events,
            'categories' => $categories,
            'types' => $types,
            'data' => true
        ]);
    }

    public function storeCategory(Request $request)
    {
        $validatedInputCatData = $request->validate([
            'category_name' => 'required|unique:category|min:3',
            'category_image' => 'required|mimes:jpg.jpeg,png'
        ],
        [
            'category_name.required' => 'Введіть унікальну назву "Категорії" Спорт-події довжинною більше ніж три символи!',
            'category_image' => 'Додавання фото можливо лише в форматі: JPG.JPEG або PNG '
        ]);

        $category_image = $request->file('category_image');

        $nameCat_gen = hexdec(uniqid());
        $img_ext = strtolower($category_image->getClientOriginalExtension());
        $nameCat_gen = $nameCat_gen.'.'.$img_ext;
        $up_location = '/public/admin/assets/images/category/';
        $last_img = $up_location.$nameCat_gen;

        CategoriesModel::insert([
            'category_name' => $request->category_name,
            'category_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('Категорію успішно додано!');

    }

    public function storeTypes(Request $request)
    {
        $validatedInputTypeData = $request->validate([
            'type_name' => 'required|unique:type|min:3'
        ],
        [
            'type_name.required' => 'Введіть унікальну назву "Типу" Спорт-події довжинною більше ніж три символи!',
            'type_name' => 'Успішно додано новий "Тип" Спорт-подій!'
        ]);

        CategoriesModel::insert([
            'type_name' => $request->type_name,
            'created_at' => Carbon::now()
        ]);
    }
}
