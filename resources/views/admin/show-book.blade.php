@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center fs-2 text-white bg-success">
                        <h1>Add Books </h1>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    
                    <div class="card-body">
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
{{-- $table->id();
$table->string('title')->nullable();
$table->string('author_name')->nullable();
$table->string('price')->nullable();
$table->longText('description')->nullable();
$table->string('quantity')->nullable();
$table->string('book_img')->nullable();
$table->string('author_img')->nullable();

$table->unsignedBigInteger('category_id');
$table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
$table->timestamps(); --}}