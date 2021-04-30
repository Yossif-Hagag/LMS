@extends('layouts.app')


@section('style')
   <style>
       .card{
           border:1px solid #38c172;
       }

       .card-body{
           border-top:0.5px solid #38c172;
       }
   </style>
@endsection


@section('links')
   <li class="nav-item">
       <a class="nav-link" href="{{ url('/lib') }}"> Home </a>
   </li>
   <li class="nav-item">
        <a class="nav-link" href="{{ url('/complaint/complaintShow') }}"> Complaint Show </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/users/allmembers') }}"> All Members </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/update') }}"> Update Book </a>
    </li>
@endsection


@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 col-sm-12">
           <!-- mt-5 a5tsar l margin top w -5 y3ny 5em -->
           <div class="card mt-5">
               <div class="card-header ">Add Book</div>
               <div class="card-body">
                   <form method="post" action="{{ url('/books') }}">
                       @csrf
                       <div class="form-group">
                           <label for="1"> 
                               Name :
                           </label>
                           <!-- required de may3ml4 submet aw ylode l7aga mn 8er ma ymla el input -->
                           <input type="text" name="name" class="form-control" placeholder="book name" id="1" required> <!--required-->
                       </div>
                       <!--  -->
                       <div class="form-group">
                           <label for="2">
                               Description :
                           </label>
                           <textarea rows="5" name="description" class="form-control" placeholder="book description" id="2" required></textarea>
                       </div>
                       <!--  -->
                       <div class="form-group">
                           <button class="btn btn-success" type="submit">Create</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
   
@endsection
