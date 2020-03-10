<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
class CategoryController extends Controller
{
    //public function index(User $user)
    public function index()
    {

    	/*return view('dashboard', [
    		'users' => $user->take(5)->get()
    	]);*/
    	$categories = Category::all();
    	return view('admin.categories.index', compact('categories'));
    } 
    public function store(Request $request)
    {
    	//dd($request->all());
    	$category = new Category();
        $category->category = $request->category;
        $category->slug = $request->slug;
    	$category->description = $request->description;
    	$category->save();
        //return $category;
    	return redirect()->route('categories.index')->with('info', 'Categoria registrada con exito.!');
    }

    public function edit($category)
    {
        $category = Category::find($category);
        return $category;
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'slug' => 'required|unique:categories,slug,' .$id,

        ]);
        Category::find($id)->update($request->all());
        return;

    }

    public function destroy($category)
    {
        $cate = Category::where('id', $category)->first();
        $cate->delete();
    }





    public function getCategory($slug)
    {
        if(Category::where('slug', $slug)->first()){
            return 'Slug Existe';
        }else{
            return 'Slug Disponible';
        }
        //$categories = Category::all();
        //return $categories;
    }
}
