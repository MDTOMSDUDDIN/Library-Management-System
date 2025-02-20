@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header text-center fs-2 text-white bg-success">
                        <h1>Add Books </h1>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-danger">{{ Session::get('success') }}</div>
                    @endif
                    
                    <div class="card-body">
                        @if (session()->has('delete'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                {{ session('delete') }}
                            </div>
                        @endif
                        <table class="table table-responsive">
                          <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Book Image </th>
                                <th>Author Image </th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author_name }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td style="width: 80px;   height:90px;">
                                      <img src="{{ asset('images/book') }}/{{ $book->book_img }}" alt="">
                                    </td>
                                    <td style="width: 80px;   height:90px;">
                                        <img src="{{ asset('images/auhtor')}}/{{ $book->author_img }}" alt="">
                                    </td>
                                    <td>{{ $book->category->cat_title }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('edit.book',['id'=>$book->id]) }}">Edit</a>
                                        <a onclick="confirmation(event)" href="{{ route('delete.book',['id'=>$book->id]) }}" class="btn btn-danger">Delete</a>
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
    <script type="text/javascript">
        function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect= ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({ 
                title: "Are you sure you want to delete this Book ?", 
                text: "You will not be able to revert this!", 
                icon: "warning",
                buttons: true, 
                dangerMode: true, 
            })
            .then((willDelete) => { 
                if (willDelete) { 
                    window.location.href = urlToRedirect; 
                }
            });

        }
    </script>