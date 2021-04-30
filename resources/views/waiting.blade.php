@extends('layouts.app')


@section('links')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}"> Home </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/complaint/complaintFill') }}"> Complaint Fill </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/myBooks') }}"> My Books </a>
    </li>
@endsection


@section('style')
    <style>
        body{
            background-color:lightslategrey;
        }

        .card-body{
            height :270px;
            overflow :hidden;
        }
        
        form{
            display:flex;
            align-items:center;
            justify-content:space-around;
        }

        .wait{
            background-color:#38c172;
            color:#fff;
            height:36px;
            text-align:center;
            border-radius: .25rem;
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
        @if(auth()->user()->id == $book->member_id && $book->borrowed == false)
                <div class="col-md-4">
                    <div class="card mb-5">
                        <div class="card-header">{{ $book->name }}</div>
                        <div class="card-body">
                        {{ $book->description }}
                        </div>
                        <div class="card-footer">
                            <div class ="wait pt-2 pb-2">
                                <p> Please , Wait for Approving your request .... </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class = "paginate">{{$books->links()}}</div>
</div>
@endsection
