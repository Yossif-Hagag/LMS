@extends('layouts.app')


@section('style')
   <style>
       .card-header{
            font-weight:bold;
            background-color:#aaa;
       }

       span{
            font-weight:bold;
       }
       
       .card-body{
           border-top:0.5px solid  #fff;
           border-bottom:0.5px solid  #fff;
           background-color:#ddd;
       }

       .paginate{
            display:flex;
            justify-content:space-around;
        }

        input{
            border:1px solid #fff;
        }

        form{
            display:flex;
           justify-content:space-between;
        }

        .del{
           justify-content:space-around;
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
        <a class="nav-link" href="{{ url('/books/update') }}"> Update Book </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/books/create') }}"> Create Book </a>
@endsection


@section('content')
<div class="container">
    <div class="row">       
        @foreach ($members as $member)
        <div class="col-md-10 ml-5">
            <div class="card mb-5 ml-5">
                <div class="card-header"> {{ $member->name }} </div>                  
                <div class="card-body">
                   <div> <span>Id</span> : {{ $member->id }}</div>
                   <div> <span>E-mail</span> : {{ $member->email }}</div>
                   <div> <span>ID Card</span> : {{ $member->id_card }}</div>
                   <div> <span>Phone Number</span> : {{ $member->phone_number }}</div>
                   <div> <span>Fine</span> : {{ $member->fines }}</div>
                   <form method="post" action="{{ route('addFine', $member->id) }}">
                        @csrf
                        <input type="text" name="fine" placeholder="  Add Fine" required>
                        <button class="btn btn-success" type="submit">  Add Fine  </button>
                    </form>
                </div>
                <div class="card-footer">
                    <form method="post" class="del" action="{{ route('deletemember', $member->id) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">  Delete Member  </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class = "paginate">{{$members->links()}}</div>
</div>
@endsection