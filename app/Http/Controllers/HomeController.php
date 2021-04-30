<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book; 

class HomeController extends Controller
{
    /** 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('libauth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::whereNull('member_id')->where('borrowed', false)->orderby('id','desc')->paginate(9);
        return view('home' , ['books' =>$books]);  
    }
}
