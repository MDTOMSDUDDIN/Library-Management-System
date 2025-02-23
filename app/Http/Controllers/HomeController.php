<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('home.index', [
            'books' => $books,
        ]);
    }

    public function book_details($id)
    {
        $books = Book::find($id);
        return view('home.book-details', [
            'books' => $books,
        ]);
    }

    public function borrow_book($id)
    {
        $books = Book::find($id);
        $quantity = $books->quantity;
        $book_id = $id;

        if ($quantity >= '1') {
            if (Auth::id()) {
                $user_id = Auth::user()->id;
                $borrow = new Borrow();
                $borrow->book_id = $book_id;
                $borrow->user_id = $user_id;
                $borrow->save();
                return redirect()->back()->with('message', 'A request has been sending Admin to Borrow this Book');
            } else {
                return redirect('/login');
            }
        } else {
            return redirect()->back()->with('message', 'Not Enough Books Avilable');
        }
    }


    public function book_history()
    {
        if (Auth::id()) {
            $userId = Auth::user()->id;
            $data = Borrow::where('user_id', '=', $userId)->get();

            return view('home.book-history', [
                'data' => $data,
            ]);
        }
    }

    public function Cancel_request($id)
    {
        $data = Borrow::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Book borrow Request Cenceled Successfully ');
    }


    public function explore()
    {
        $book = Book::all();
        $category = Category::all();

        return view('home.explore', [
            'book' => $book,
            'category' => $category,
        ]);
    }


    public function search(Request $request)
    {
        $category = Category::all();
        $search = $request->search;
        $book = Book::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('author_name', 'LIKE', '%' . $search . '%')
            ->get();
        return view('home.explore', [
            'book' => $book,
            'category' => $category,
        ]);
    }

    public function cat_search($id)
    {
        $category = Category::all();
        $book = Book::where('category_id', $id)->get();

        return view('home.explore', [
            'book' => $book,
            'category' => $category,
        ]);
    }
}
