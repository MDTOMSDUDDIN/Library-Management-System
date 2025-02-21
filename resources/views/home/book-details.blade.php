@extends('masterLayouts.main')
@section('content')
    <div class="item-details-page">
        <div class="container">
            <div class="row">
              $
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>View Details <em>For Item</em> Here.</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="left-image">
                        {{-- <img src="assets/images/banner.png" alt="" style="border-radius: 20px;"> --}}
                        <img src="{{ asset('images/book') }}/{{ $books->book_img }}" alt="" style="border-radius: 20px; height:450px;">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <h4>{{ $books->title }}</h4>
                    <span class="author">
                        {{-- <img src="assets/images/author-02.jpg" alt="" style="max-width: 50px; border-radius: 50%;"> --}}
                        <img src="{{ asset('images/auhtor') }}/{{ $books->author_img }}" alt="" style="max-width: 50px; border-radius: 50%;">
                        <h6>{{ $books->author_name }}</h6>
                    </span>
                    <p>{{ $books->description }}</p>
                    <div class="row">
                        <div class="col-3">
                            <span class="bid">
                                Price<br><strong>{{ $books->price }}</strong><br>
                            </span>
                        </div>

                        <div class="col-5">
                            <span class="ends">
                                Total Quantity<br><strong>{{ $books->quantity }}</strong><br>
                            </span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
