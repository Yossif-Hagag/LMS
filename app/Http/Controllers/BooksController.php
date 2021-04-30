<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Complaint;

class BooksController extends Controller
{
    /** 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home'); 
    }

    public function clear(){
        auth()->user()->massege = null;
        auth()->user()->update();
        return back();
    }

    public function borrow(Book $book){
        $book->member_id = auth()->user()->id;
        $book->borrowed = false;
        $book->update();
        return back();
    }


    public function approve(Book $book){
        $book->borrowed = true;
        $book->update();
        $member = User::find($book->member_id);
        $member->massege = ' You are borrow a book successfully Make sure to return it before 7 Days , Enjoy ! ';
        $member->update();
        return back();
    }

    public function noApprove(Book $book){
        $book->member_id = null; 
        $book->update ();
        return back();
    }

    public function returnBook(Book $book){
        $book->borrowed = false;
        $book->member_id = null; 
        $book->update ();
        auth()->user()->massege =' You are return a book successfully , We hope you enjoyed it :D ';
        auth()->user()->update();
        return back();
    }

    public function myBooks(){
        $books = Book::whereNotNull('member_id')->where('borrowed', true)->orderby('id','desc')->paginate(9);
        return view('myBooks' , ['books' =>$books]);
    }

    public function waiting(){
        $books = Book::whereNotNull('member_id')->where('borrowed', false)->orderby('id','desc')->paginate(9);
        return view('waiting' , ['books' =>$books]);
    }

    public function create()
    {
        return view('createBooks'); 
    }

     public function store()
    {
        $book = new book();
        $book->name = request('name');
        $book->description = request('description');
        $book->save();
        return back();
    }

    public function savee(Book $book)
    {
        $book->name = request('name');
        $book->description = request('description');
        $book->save();
        return redirect('books/update');
    }

    public function update()
    {
        $books = Book::orderby('id','desc')->paginate(9);
        return view('updateBooks' , ['books' =>$books]); 
    }

    public function edit(Book $book){
        $bookk = Book::find($book);
        return view('edit' , ['bookk' => $bookk]);
    }

    public function delete(Book $id){
        $id->delete();
        return back();
    }

    public function complaintFill(){
        return view('complaintFill');
    }

    public function complaint(){
        $complaint = new complaint();
        $complaint->comment = request('description');
        $complaint->user_id = auth()->user()->id;
        $complaint->save();
        return back();
    }

    public function complaintShow(){
        $comments = Complaint::orderby('user_id','desc')->paginate(9);
        $members = User::all();
        return view('complaintShow' , ['comments' => $comments , 'members' => $members]);
    }

    public function deleteComment(Complaint $id){
        $id->delete();
        return back();
    }

    public function allmembers(){
        $members = User::where('type', 'member')->orderby('id','asc')->paginate(9);
        return view('allmembers' , ['members' => $members]);
    }

    public function addFine(User $id){
        $id->fines = request('fine');
        $id->save();
        return back();
    }

    public function deletemember(User $id){
        $id->delete();
        return back();
    }

}
