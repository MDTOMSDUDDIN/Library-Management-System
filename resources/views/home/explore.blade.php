@extends('masterLayouts.main')
@section('content')
    <div class="currently-market">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2><em>Items</em> Currently In The Market.</h2>
                    </div>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session('message') }}
                    </div>
                @endif

                <div class="col-lg-6 mt-5">
                    <div class="filters">
                        <ul>
                            <li data-filter="*" class="active">All Books</li>
                            @foreach ($category as $category)

                            <li >
                                <a href="{{ route('category.search',['id'=>$category->id]) }}">{{ $category->cat_title }}</a>
                            </li>

                            @endforeach
                        </ul>
                    </div>
                </div>

              <div class="mb-5">
                <form action="{{ route('search') }}" method="get">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <input type="search" name="search" class="form-control"
                                placeholder="Search for Book name,Author Name,Category" />
                        </div>
                        
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-primary" value="search">
                        </div>

                    </div>
                </form>
              </div>


                <div class="col-lg-12">
                    <div class="row grid">
                        @foreach ($book as $book)
                            <div class="col-lg-6 currently-market-item all msc">
                                <div class="item">
                                    <div class="left-image">
                                     
                                        {{-- <img src="assets/images/book1.webp" alt="" style="border-radius: 20px; min-width: 195px;"> --}}
                                        <img src="{{ asset('images/book') }}/{{ $book->book_img }}" alt=""
                                            style="border-radius: 20px; min-width: 195px; height:300px;">

                                    </div>
                                    <div class="right-content">
                                        <h4>{{ $book->title}}</h4>
                                        <span class="author">
                                            {{-- <img src="assets/images/author.jpg" alt=""style="max-width: 50px; border-radius: 50%;"> --}}
                                            <img src="{{ asset('images/auhtor') }}/{{ $book->author_img }}" alt=""
                                                style="max-width: 50px; border-radius: 50%;">
                                            <h6>{{ $book->author_name }}</h6>
                                        </span>

                                    

                                        <div class="line-dec"></div>
                                        <span class="bid">
                                            Current Available<br><strong>{{ $book->quantity }}</strong><br>
                                        </span>
                                        <span class="ends">
                                            Total<br><strong>20</strong><br>
                                        </span>
                                        <div class="text-button">
                                            <a href="{{ route('home.book.details', ['id' => $book->id]) }}">View Item
                                                Details</a>
                                        </div><br>


                                        <div>
                                            <a class="btn btn-primary"
                                                href="{{ route('book.borrow', ['id' => $book->id]) }}">Apply To Borrow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
