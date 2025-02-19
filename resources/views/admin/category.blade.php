@extends('admin.adminLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session('success') }}
                    </div>
                 @endif
                @if (session()->has('delete'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session('delete') }}
                    </div>
                 @endif
                    <div class="card-header bg-success text-white"> 
                        <h1 class="text-center fs-1">Category List</h1>
                    </div>
                   
                    <div class="card-body text-center">
                        <table class="table table-responsive border-secondary">
                            <tr>
                                <th >Category Name</th>
                                <th >Action</th>
                            </tr>
                            @foreach ($categories as $category)
                            <tr >
                                <td>{{ $category->cat_title }}</td>
                                <td>
                                    <a href="{{ route('admin.category.Edit',['id'=>$category->id]) }}" class="btn btn-info">Edit</a>
                                    <a onclick="confirmation(event)" href="{{ route('admin.category.Delete',['id'=>$category->id]) }}" class="btn btn-danger"> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-success text-white fs-2 ">
                    <h1 class="text-center fs-1">Add Category</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.add.category') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Category Name</label>
                            <input type="text" name="category" id="" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success">Add-category</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

    </div>
@endsection

<script type="text/javascript">
    function confirmation(ev) { 
        ev.preventDefault(); 
        var urlToRedirect = ev.currentTarget.getAttribute('href'); 
        console.log(urlToRedirect); 
        swal({ 
            title: "Are you sure you want to delete this Category ?", 
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