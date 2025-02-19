<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){
            $user_type=Auth::user()->usertype;

            if ($user_type == 'admin') {
                return view('admin.index'); 
            } elseif($user_type == 'user'){
                return view('home.index');
            }
        }
        else{
          return redirect()->back();
        }
    }

    public function category_page(){
        $categories=Category::all();
        return view('admin.category',[
            'categories'=>$categories,
        ]);
    }

    public function add_category(Request $request){
        $request->validate([
            'category' => 'required|string|max: 100',
        ]);
    
        
        $category = Category::create([
            'cat_title' => $request->category,
        ]);
        $category->save();
        return back()->with('success','Category add successfully !');
    }

    public function Delete_category($id){
        $category=Category::find($id);
        $category->delete();

       return back()->with('delete','Category Delete successfully !');

    }

    public function edit_category($id){
        $category=Category::find($id);
        return view('admin.category-edit',[
            'category'=>$category,
        ]);
    }

    public function update_category(Request $request,$id){
        $category=Category::findOrFail($id);
        $request->validate([
            'category' => 'required|string|max: 100',
        ]);

        $category->update([
            'cat_title' => $request->category,
        ]);
        return redirect()->route('admin.category.page')->with('success','Category Updated successfully !');
    }
}
