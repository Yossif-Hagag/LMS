@extends('layouts.app')


@section('style')
   <style>
       .card-header{
            font-weight:bold;
            background-color:#aaa;
       }

       .card-body{
           border-top:0.5px solid  #fff;
           background-color:#ddd;
           display:flex;
           justify-content:space-between;
       }

       .paginate{
            display:flex;
            justify-content:space-around;
        }

   </style>
@endsection


@section('links')
   <li class="nav-item">
       <a class="nav-link" href="{{ url('/lib') }}"> Home </a>
   </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/users/allmembers') }}"> All Members </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/update') }}"> Update Book </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/create') }}"> Create Book </a>
@endsection


@section('content')
<div class="container">
    <div class="row">       
        @foreach ($comments as $comment)
        <div class="col-md-10 ml-5">
            <div class="card mb-5 ml-5">
                @foreach ($members as $member)
                    @if($comment->user_id == $member->id)
                        <div class="card-header"> {{ $member->name }} </div>                  
                    @endif
                @endforeach 
                <div class="card-body">
                    <div class="mr-5">{{ $comment->comment }}</div>
                    <form method="post" action="{{ route('deleteComment', $comment->id) }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">  Delete  </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class = "paginate">{{$comments->links()}}</div>
</div>
@endsection
