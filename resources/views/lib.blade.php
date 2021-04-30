@extends('layouts.app')


@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/complaint/complaintShow') }}"> Complaint Show </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/users/allmembers') }}"> All Members </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/update') }}"> Update Book </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/create') }}"> Create Book </a>
    </li>
@endsection


@section('style')
    <style>
        body{
            background-color:antiquewhite;    
        }

        .card{
            border:1px solid black;
        }

        .card-body{
            border-top:0.5px solid black;
            border-bottom:0.5px solid black;
            height :270px;
            overflow :scroll;
        }

        .card-footer{
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        
        .paginatee{
            display:flex;
            justify-content:space-around;
        }
    </style>
@endsection


@section('content')
<div class="container">
    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-4">
            <div class="card mb-5">
                <div class="card-header">{{ $book->name }}</div>
                <div class="card-body">
                   {{ $book->description }}
                </div>
                <div class="card-footer">
                    <form method="post" action="{{ route('approve', $book->id) }}">
                        @csrf
                        <button class="btn btn-dark" type="submit">Approve</button>
                    </form>
                    <form method="post" action="{{ route('noApprove', $book->id) }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class = "paginatee">{{$books->links()}}</div>
</div>
@endsection
