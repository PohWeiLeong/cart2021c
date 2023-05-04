<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function add(){
        $r=request();
        $addCategory=Category::create([
            'name'=>$r->categoryName,
        ]);
        return redirect()->route('viewCategory');
    }

    public function view(){
        $viewCategory=Category::all(); // generate SQL select * from categories
        return view('showCategory')->with('categories',$viewCategory);
    }
}
