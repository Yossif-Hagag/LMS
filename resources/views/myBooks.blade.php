@extends('layouts.app')


@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}"> Home </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/complaint/complaintFill') }}"> Complaint Fill </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/waiting') }}"> Waiting List </a>
    </li>
@endsection


@section('style')
    <style>
        body{
            background-color:darkslategray;
        }

        .card-body{
            height :270px;
            overflow :scroll;
        }
        
        form{
            display:flex;
            align-items:center;
            justify-content:space-around;
        }

        .paginate{
            display:flex;
            justify-content:space-around;
        }
    </style>
@endsection


@section('content')
<div class="container">

    @if(auth()->check())
        @if(auth()->user()->massege != null)

            <a href="{{ url('/clear') }}">
                <div class="alert alert-success">
                    {{ auth()->user()->massege}}
                </div>
            </a>

        @endif
    @endif


    <div class="row">
        @foreach ($books as $book)
        @if(auth()->user()->id == $book->member_id && $book->borrowed == true)
                <div class="col-md-4">
                    <div class="card mb-5">
                        <div class="card-header">{{ $book->name }}</div>
                        <div class="card-body">
                        {{ $book->description }}
                        </div>
                        <div class="card-footer">
                                <form method="post" action="{{ route('returnBook', $book->id) }}">
                                    @csrf
                                    <button class="btn btn-info" type="submit"> Return </button>
                                </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class = "paginate">{{$books->links()}}</div>
</div>
@endsection
