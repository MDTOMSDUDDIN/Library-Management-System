@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center fs-2 text-white bg-success">
                        <h1>Add Books </h1>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    
                    <div class="card-body">
                        <form action="{{ route('store.book') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label>Category</label>
                                <select required name="category">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $category )
                                    <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="Author">Author Name</label>
                                <input type="text" name="author_name" id="author_name" placeholder="author_name" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="Price">Price</label>
                                <input type="number" name="price" id="price" placeholder="price" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label for="floatingTextarea">Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" id="description" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                  </div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="quantity">quantity</label>
                                <input type="number" name="quantity" id="quantity" placeholder="quantity" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="book_img">book_img</label>
                                <input type="file" name="book_img" id="book_img" placeholder="book_img" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="book_img">author_img</label>
                                <input type="file" name="author_img" id="author_img" placeholder="author_img" class="form-control">
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="btn btn-success">Add Books</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection