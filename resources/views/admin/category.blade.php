@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-hearder fs-2 ">
                    <h1 class="text-center fs-1">Add Category</h1>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.add.category') }}" method="Post" >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Category Name</label>
                            <input type="text" name="category" id="" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Add-category</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection