@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-success text-white fs-2 ">
                        <h1 class="text-center fs-1">Update Category</h1>
                    </div>
    
                    <div class="card-body">
                        <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="">Category Name</label>
                                <input type="text" name="category" id="" class="form-control" placeholder="Category Name" value="{{ $category->cat_title }}">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success">Update-category</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
        </div>
    </div>
@endsection