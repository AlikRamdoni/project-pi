<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
{
    $category = $request->query('category');
    if ($category) {
        $menuItems = Menu::where('category', $category)->get();
    } else {
        $menuItems = Menu::all();
    }

    // Debugging output
    if ($menuItems->isEmpty()) {
        return response()->json(['message' => 'No menu items found for the given category.'], 404);
    }

    foreach ($menuItems as $item) {
        if (!$item) {
            return response()->json(['message' => 'Null item found in the menu items collection.'], 500);
        }
    }

    return view('menu', ['menuItems' => $menuItems]);
}
}
