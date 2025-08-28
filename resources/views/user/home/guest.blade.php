@extends('user.layouts.master')

@section('content')

<!-- banner start -->
<section id="banner" class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center text-center my-2">
      <div class="col-md-8 col-lg-6">
        <h2 class="text-dark mb-3">📚 Welcome to <span class="text-danger">Our Bookworm</span></h2>
        <p class="text-muted">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid deserunt ad reiciendis. In dolor aut dignissimos reiciendis totam ratione sint culpa, voluptates unde nam explicabo sequi! Quam ipsam consequatur beatae?
        </p>
      </div>
    </div>
  </div>
</section>
<!-- banner end -->


   <!-- latest book start -->
    <section id="latest-book" >

      <div class="container text-center my-5">
        <div class=" mx-auto mb-5" style="max-width: 700px;">
          <h1 class="display-3">Latest Books</h1>
        </div>


          <div class="row g-4 ">
        @foreach($books as $item)
             <div class="col-lg-3 col-md-4 col-6" data-aos="fade">
                <div class="book-box rounded shadow">
                      <a href="#">
                        <img src="{{ asset('book/'.$item->image)}}" class="img-fluid rounded-top book-img" alt="">
                      </a>
                      <!-- details link -->
                  <div class="p-4 shadow rounded-bottom">
                    <h5 class="my-3 book-title">{{ $item->title}}</h5>
                    <p class="book-author">By <a href="#" class="text-dark fw-5">{{ $item->book_author}}</a></p>
                    <a href="#" class="btn-sm border border-dark rounded-pill px-3 text-dark bg-white hover-effect">
                      <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save
                    </a>
                  </div>
              </div>
            </div>
        @endforeach

          </div>


    <div class=" text-center mt-4">
    <a href="#" class="btn btn-dark px-4 py-2">See More »</a>
  </div>
  </div>


</section>
   <!-- latest book end -->


  <!-- Author Start-->
<div class="container-fluid py-5">

  <div class="text-center mx-auto mb-5" style="max-width: 700px;">
    <h1 class="display-3">Authors</h1>
    <p>Some description text here...</p>
  </div>

  <div class="owl-carousel author-carousel">
   @foreach($authors as $item)
     <div class="author-box text-center p-4 rounded bg-light">
      <img src="{{ asset('author/'.$item->proflie)}}" class="img-fluid rounded-circle mb-3 mx-auto" style="width: 120px; height: 120px;" alt="author">
      <h5 class="mb-1">{{ $item->name}}</h5>
      <p class="mb-2">{{ $item->total_book}}</p>
      <a href="#" class="btn border border-dark rounded-pill px-3 text-dark hover-effect">
        <i class="fa fa-shopping-bag me-2 text-dark"></i>Biography
      </a>
    </div>

   @endforeach

  </div>

</div>

<!--Author End -->

<!--category  start -->
<section id="categorySection ">
  <div class="container-fluid py-5 mb-5">
    <div class="container py-5">
      <div class="text-center mx-auto mb-5" style="max-width: 700px;">
        <h1 class="display-3">Categories</h1>
        <p>Some description text here...</p>
      </div>
    </div>
  </div>

  <div class="container text-center">
  <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
  @foreach($categories as $item)
    <div class="col">
        <a href="#" class="p-4 d-block bg-color rounded shadow text-dark fs-5 ">{{ $item->name}}</a>
    </div>

  @endforeach
  </div>
</div>
</section>
<!-- category end -->

@endsection
