@extends('user.layouts.master')

@section('content')

<!-- author detail start -->
 <div class="container-fluid">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
       <ol class="breadcrumb">
    <li class="breadcrumb-item " ><a href="#" style="color:var(--bs-info)">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Author</li>
  </ol>
</nav>
        <div class="row">
            <div class="col-lg-7 offset-5 mb-5">
                <div class="rounded">
                    <a href="#" class="">
                        <img src="img/author1.jfif" class="img-fluid rounded" alt="Image">
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-3 text-center">
                <h4 class="fw-bold mb-3">Biography</h4>
                <p class="mt-3 fw-3">
                <a href="" class="text-dark">ဂျူး</a>
                </p>
            <p class="mt-3">Category:
                <a href="" class="text-dark">novel</a>
            </p>
                <h5 class="fw-bold mb-3">Description</h5>
                <p class="">is a deeply emotional and poetic collection that captures the essence of longing, love, and human vulnerability. Ju’s writing is soft, reflective, and often filled with pain, yet also graceful and beautiful. This book is less about plot and more about the emotions and moments that shape the human experience.</p>

            </div>
        </div>
        <hr>
    </div>
</div>
<!-- author detail end -->

<!-- author book start -->
<div class="book_wrapper">
    <div class="container-fluid">
       <div class="row mb-5">
        <div class="col-12">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-3">Authors</h1>
                <p>Some description text here...</p>
             </div>
        </div>
        <div class="owl-carousel book-carousel">
             <div class="book-box  shadow rounded">
                <img src="img/book1.jpg" alt="book" class="img-fluid book-img rounded-top">
                <div class="book_text rounded-bottom p-4">
                <h5 class="head-text">တွေ့ချင်လှပြီ</h5>
                <p class="book-author">By <a href="#">ဂျူး</a></p>
                <a href="#" class="btn-sm border border-dark rounded-pill px-3 text-dark bg-white hover-effect">
                <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save
                </a>
            </div>
            </div>
            <div class="book-box  shadow rounded">
                <img src="img/book1.jpg" alt="book" class="img-fluid book-img rounded-top">
                <div class="book_text rounded-bottom p-4">
                <h5 class="head-text">တွေ့ချင်လှပြီ</h5>
                <p class="book-author">By <a href="#">ဂျူး</a></p>
                <a href="#" class="btn-sm border border-dark rounded-pill px-3 text-dark bg-white hover-effect">
                <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save
                </a>
            </div>
            </div>
            <div class="book-box  shadow rounded">
                <img src="img/book2.jpg" alt="book" class="img-fluid book-img rounded-top">
                <div class="book_text rounded-bottom p-4">
                <h5 class="head-text">တွေ့ချင်လှပြီ</h5>
                <p class="book-author">By <a href="#">ဂျူး</a></p>
                <a href="#" class="btn-sm border border-dark rounded-pill px-3 text-dark bg-white hover-effect">
                <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save
                </a>
            </div>
            </div>
            <div class="book-box  shadow rounded">
                <img src="img/book3.jpg" alt="book" class="img-fluid book-img rounded-top">
                <div class="book_text rounded-bottom p-4">
                <h5 class="head-text">တွေ့ချင်လှပြီ</h5>
                <p class="book-author">By <a href="#">ဂျူး</a></p>
                <a href="#" class="btn-sm border border-dark rounded-pill px-3 text-dark bg-white hover-effect">
                <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save
                </a>
            </div>
            </div>
            <div class="book-box  shadow rounded">
                <img src="img/book4.jpg" alt="book" class="img-fluid book-img rounded-top">
                <div class="book_text rounded-bottom p-4">
                <h5 class="head-text">တွေ့ချင်လှပြီ</h5>
                <p class="book-author">By <a href="#">ဂျူး</a></p>
                <a href="#" class="btn-sm border border-dark rounded-pill px-3 text-dark bg-white hover-effect">
                <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save
                </a>
            </div>
            </div>
                 <div class="book-box  shadow rounded">

                <img src="img/book4.jpg" alt="book" class="img-fluid book-img rounded-top">
                <div class="book_text rounded-bottom p-4">
                <h5 class="head-text">တွေ့ချင်လှပြီ</h5>
                <p class="book-author">By <a href="#">ဂျူး</a></p>
                <a href="#" class="btn-sm border border-dark rounded-pill px-3 text-dark bg-white hover-effect">
                <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save
                </a>
            </div>
            </div>
        </div>
       </div>
    </div>
</div>
<!-- author book end -->

@endsection
