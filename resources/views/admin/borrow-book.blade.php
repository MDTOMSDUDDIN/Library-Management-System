@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
         <div class="col-md-10 m-auto ">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h1>Borrow list</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Book Title</th>
                                <th>Quantity</th>
                                <th>Borrow Status</th>
                                <th>Book Image</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ( $borrows as $index =>  $borrow)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $borrow->user->name }}</td>
                                <td>{{ $borrow->user->email }}</td>
                                <td>{{ $borrow->user->phone }}</td>
                                <td>{{ $borrow->book->title }}</td>
                                <td>{{ $borrow->book->quantity }}</td>
                                <td>{{ $borrow->status }}</td>
                                <td>
                                    <img src="{{ asset('images/book') }}/{{ $borrow->book->book_img }}" alt="" style="width: 80px;height:60px ;">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

         </div>
        </div>
    </div>
@endsection