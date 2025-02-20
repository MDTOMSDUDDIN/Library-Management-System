<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
//--------------------------------------------------------------------------------
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

    public function add_book(){
        $category=Category::all();
        return view('admin.add-book',[
            'category'=>$category,
        ]);
    }

    public function store_book(Request $request){


        $book=new Book();
        $book->title=$request->title;
        $book->author_name=$request->author_name;
        $book->category_id=$request->category;
        $book->price=$request->price;
        $book->description=$request->description;
        $book->quantity=$request->quantity;

        $book_image = $request->book_img;
        if ($book_image) {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();
            $request->book_img->move('images/book', $book_image_name);
        
            $book->book_img = $book_image_name;
        }

        $author_image = $request->author_img;
        if ($author_image) {
            $author_image_name = time() . '.' . $author_image->getClientOriginalExtension();
            $request->author_img->move('images/auhtor', $author_image_name);
        
            $book->author_img = $author_image_name;
        }
        
        $book->save();
        return  back()->with('success','Books Add successfully !');
    }

    public function show_book(){
        $books=Book::all();
        return view('admin.show-book',[
            'books'=>$books,
        ]);
    }

    
    public  function delete_book($id){
        $books=Book::find($id);
        $books->delete();

        return  back()->with('delete','Books Deleted successfully !');
    }

}
