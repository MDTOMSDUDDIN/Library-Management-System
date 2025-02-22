@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
         <div class="col-md-12 m-auto ">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h1>Borrow list</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead >
                            <tr class="text-center fs-6 text-white">
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Book Title</th>
                                <th>Quantity</th>
                                <th>Borrow Status</th>
                                <th>Book Image</th>
                                <th>Book Status</th>
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
                                <td>
                                    @if ($borrow->status=='approved')
                                        <span style="color: green ">{{ $borrow->status }}</span>
                                    @elseif ($borrow->status=='rejected')
                                        <span style="color:red ">{{ $borrow->status }}</span>
                                    
                                    @elseif ($borrow->status=='returned')
                                        <span style="color:rgb(255, 255, 0) ">{{ $borrow->status }}</span>
                                    
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('images/book') }}/{{ $borrow->book->book_img }}" alt="" style="width: 80px;height:60px ;">
                                </td>
                                <td class="d-flex fs-6">
                                    <a href="{{ route('approved.book.status',['id'=>$borrow->id]) }}" class="badge badge-success   p-2  mr-2">Approved</a>
                                    <a href="{{ route('rejected.book.status',['id'=>$borrow->id]) }}" class="badge badge-danger  p-2  mr-2">Rejected</a>
                                    <a href="{{ route('returned.book.status',['id'=>$borrow->id]) }}" class="badge badge-info  p-2  mr-2">Returned</a>
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