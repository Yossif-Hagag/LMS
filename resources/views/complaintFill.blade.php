@extends('layouts.app')


@section('style')
   <style>
       .card{
           border:1px solid  #e3342f;
       }

       .card-body{
           border-top:0.5px solid  #e3342f;
       }
   </style>
@endsection


@section('links')
   <li class="nav-item">
       <a class="nav-link" href="{{ url('/home') }}"> Home </a>
   </li>
   <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/waiting') }}"> Waiting List </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/myBooks') }}"> My Books </a>
    </li>
@endsection


@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 col-sm-12">
           <div class="card mt-5">
               <div class="card-header ">Add Complaint</div>
               <div class="card-body">
                   <form method="post" action="{{ url('/complaint') }}">
                       @csrf
                       <div class="form-group">
                           <textarea rows="5" name="description" class="form-control" placeholder="Please , Fill your complaint specifically" required></textarea>
                       </div>
                       <div class="form-group">
                           <button class="btn btn-danger" type="submit"> Send </button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
   
@endsection
