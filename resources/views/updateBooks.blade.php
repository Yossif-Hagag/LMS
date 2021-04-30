@extends('layouts.app')


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
        <a class="nav-link" href="{{ url('/books/create') }}"> Create Book </a>
    </li>
@endsection


@section('style')
    <style>
        body{
            background-color:dimgrey;    
        }

        .card{
            border:1px solid #6cb2eb;
        }

        .card-body{
            border-top:0.5px solid #6cb2eb;
            border-bottom:0.5px solid #6cb2eb;
            height :270px;
            overflow :scroll;
        }

        .paginatee{
            display:flex;
            justify-content:space-around;
        }

        .card-footer{
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
                    <form method="post" action="{{ route('edit', $book->id) }}">
                        @csrf
                        <button class="btn btn-info" type="submit">  Edit  </button>
                    </form>
                    <form method="post" action="{{ route('delete', $book->id) }}">
                        @csrf
                        <button class="btn btn-danger" type="submit"> Delete </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class = "paginatee">{{$books->links()}}</div>
</div>
@endsection
