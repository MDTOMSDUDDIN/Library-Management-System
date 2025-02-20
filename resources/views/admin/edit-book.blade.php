@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center fs-2 text-white bg-success">
                        <h1>Edit Books </h1>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    
                    <div class="card-body">
                        <form action="{{ route('update.book',['id'=>$books->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ $books->title }}">
                            </div>

                            <div class="mb-1">
                                <label>Category</label>
                                <select required name="category">
                                    <option value="{{ $books->category->id }}">{{ $books->category->cat_title }}</option>
                                    @foreach ($category as $category )
                                    <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-1">
                                <label class="form-label" for="Author">Author Name</label>
                                <input type="text" name="author_name" id="author_name" placeholder="author_name" class="form-control" value="{{ $books->author_name }}">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="Price">Price</label>
                                <input type="number" name="price" id="price" placeholder="price" class="form-control" value="{{ $books->price }}">
                            </div>
                            <div class="mb-1">
                                <label for="floatingTextarea">Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" id="description" placeholder="Leave a comment here" id="floatingTextarea">{{ $books->description }}</textarea>
                                  </div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="quantity">quantity</label>
                                <input type="number" name="quantity" id="quantity" placeholder="quantity" class="form-control" value="{{ $books->quantity }}">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="book_img">book_img</label>
                                <input type="file" name="book_img" id="previewId" placeholder="book_img" class="form-control">
                                <img src="{{ asset('images/auhtor') }}/{{ $books->author_img }}" alt="" style="width: 90px; height:90px">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="book_img">author_img</label>
                                <input type="file" name="author_img" id="previewId" placeholder="author_img" class="form-control">
                                <img src="{{ asset('images/book') }}/{{ $books->book_img }}" style="width: 90px; height:90px">
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="btn btn-success">update Books</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function previewImage(event, previewId) {
        let reader = new FileReader();
        reader.onload = function() {
            let preview = document.getElementById(previewId);
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>