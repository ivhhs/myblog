<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use Validator;

class CategoriesController extends Controller
{
    

    public function getCreate(){
        $page_title = '添加分类';

        $categories = Categories::all();

        $data = compact('page_title','categories');
        return view('categories.create',$data);

    }

    public function postCreate(Request $request){
        $page_title = '添加分类';
        

        $all = $request->all();
        $validator = Validator::make($all, [
            'name' => 'required|max:255|unique:categories,name'
        ]);



        if ($validator->fails()) {

            $categories = Categories::all();
            $data = compact('page_title','categories');

            return view('categories.create',$data)
                ->withErrors($validator->errors());
   
        }

        Categories::create([
            'name' => $all['name']
        ]); 

        return redirect('/category');       

    }

    public function getAllCategory(){
        $page_title = '所有分类';
        $categories = Categories::all();
        $data = compact('page_title','categories');
        return view('categories.index',$data);


    }
}
