<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class LibController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('mebauth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Query builder
        $books = Book::whereNotNull('member_id')->where('borrowed', false)->orderby('id','desc')->paginate(9);
        return view('lib' , ['books' =>$books]);  
    }
}
