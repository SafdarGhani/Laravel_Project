<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    // public function index(){
    //     $subcategories = Subcategory::get();
    //     return view('subcategories.index', compact('subcategories'));
    // }

    // public function create(){
    //     return view('subcategories.create', compact('Subcategory'));
    // }

    // public function store(Request $request){
    //     $request->validate([
    //         'category_id'=> 'category_id|required',
    //         'name'=> 'name|required',
    //         'slug'=> 'slug|required',
    //         'description'=> 'description|required',
    //         'image'=> 'image|required',
    //     ]);

    //     Subcategroy::create($request->all());
    //     return redirect()->route('subcategories.index')->with('created', "Subcategory created successfully.");
    // }

}
