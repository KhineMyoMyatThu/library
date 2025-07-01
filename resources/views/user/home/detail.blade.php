@extends('user.layouts.master')

@section('content')

<!-- book detail start -->

    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item " ><a href="#" style="color:var(--bs-info)">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">book</li>
                        </ol>
                        </nav>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="rounded">
                                <a href="#">
                                    <img src="img/book1.jpg" class="img-fluid rounded" alt="Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">တွေ့ချင်လှပြီ</h4>
                            <p class="mt-3 fw-3">
                                <a href="" class="text-dark">ဂျူး</a>
                            </p>
                            <div class="d-flex fs-3 mb-3">
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star text-secondary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="">3.12 / 5.0</h4>
                            <div class="d-flex mb-4">
                                <span class=" ">

                                </span>

                                <span class=" ms-4">
                                    <i class="fa-solid fa-eye"></i>
                                </span>

                            </div>
                            <h5 class="fw-bold mb-3">Description</h5>
                            <p class="">is a deeply emotional and poetic collection that captures the essence of longing, love, and human vulnerability. Ju’s writing is soft, reflective, and often filled with pain, yet also graceful and beautiful. This book is less about plot and more about the emotions and moments that shape the human experience.</p>
                             <p class="mt-3">Category:
                                <a href="" class="text-dark">novel</a>
                            </p>
                            <form action="" method="post">

                                <button type="submit"
                                    class="btn border border-dark rounded-pill px-4 py-2 mb-4 hover-effect text-dark"> <i class="fa-solid fa-bookmark me-2 text-dark"></i>Save</button>


                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="btn border border-dark hover-effect rounded-pill px-4 py-2 mb-4 text-dark"> <i class="fa-solid fa-bookmark me-2 text-dark"></i> Rate this book</button>
                            </form>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Rate this product
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post">

                                            <div class="modal-body">

                                                <input type="hidden" name="productId" value="">

                                                <div class="rating-css">
                                                    <div class="star-icon">

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Rating</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link text-dark active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Description</button>
                                    <button class="nav-link text-dark border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Customer Comments
                                        <span
                                            class=" btn btn-sm btn-dark rounded shadow-sm"></span>

                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    <p></p>
                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel"
                                    aria-labelledby="nav-mission-tab">


                                    <div class="d-flex">
                                        <img src="img/pf.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 75px; height: 75px;">
                                        <div class="">
                                            <h5 class="" style="font-size: 14px;">UsersName
                                            </h5>
                                            <div class="d-flex justify-content-between">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa laudantium at sint cupiditate beatae aliquam ipsam itaque soluta facere fugiat?</p>

                                            </div>
                                            <p></p>
                                        </div>
                                    </div>
                                    <hr>


                                </div>
                                <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                                        tempor
                                        sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                        labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post">

                            <input type="hidden" name="productId" value="">
                            <h4 class="mb-5 fw-bold">
                                Leave a Comments

                            </h4>

                            <div class="row g-1">
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded ">
                                        <textarea name="comment" id="" class="form-control border-0 shadow-sm" cols="30"
                                            rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <button type="submit"
                                            class="btn border border-dark hover-effect text-dark rounded-pill px-4 py-3">
                                            Post
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">


                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('product/' . $item->image) }}" style="height: 250px"
                                class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">{{ $item->category_name }}</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <h4>{{ $item->name }}</h4>
                            <p>{{ Str::words($item->description, 15, '...') }}</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">{{ $item->price }} mmk</p>
                                <a href="#"
                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
<!-- book detail end -->


@endsection
