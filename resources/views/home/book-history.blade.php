@extends('masterLayouts.main')
@section('content')

<div class="container">
    <style type="text/css">
       .table_deg{
        border: 1px solid white;
        margin: auto;
        align-content: center;
        margin-top: 100px;
       }
       th{
        background-color: skyblue;
        font-weight: bold;
        color: white;
        font-size: 18px;
        padding: 12px;
       }
       td{
        color: white;
        background-color: black;
       }
    </style>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-success">{{ session::get('message') }}
            <button  type="submit" class="close ms-1" aria-hidden="true" data-bs-dismiss="alert" >X</button>
        </div>
        @endif
        <table class="table-bordered table_deg text-center">
        
                <tr>
                    <th>Book Name</th>
                    <th>Book Author</th>
                    <th>Book Status</th>
                    <th>Image</th>
                    <th>Cancel Request</th>
                </tr>
            
        
                @foreach ($data as  $data)
                      <tr>
                        <td>{{ $data->book->title }}</td>
                        <td>{{ $data->book->author_name }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <img src="{{ asset('images/book') }}/{{ $data->book->book_img }}" alt="" style="height:100px; ">
                        </td>
                        <td>
                            @if ($data->status=="Applied")
                            <a href="{{ route('cencel.request.book',['id'=>$data->id]) }}" class="btn btn-warning">Cencel</a>
                            @else
                            <p style=" font-size:blod;color:white;">Not Allowed</p>
                            @endif
                        </td>
                    </tr> 
                @endforeach
            
        </table>
        </div>
    </div>

@endsection