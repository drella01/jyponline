@extends('layouts.theme.main')
@section('content')
<main>
    <div class="mt-4">
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- col -->
          <div class="col-12">
            <!-- breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#!">Home</a></li>
                <li class="breadcrumb-item"><a href="#!">Stores</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{$name}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- section -->
    <section class="mt-8">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 col-md-4 mb-4 mb-md-0"></div>
                <div class="col-12 col-lg-9 col-md-8">
                    <div class="hero-slider ">
                        <div style="background: url(../assets/images/slider/iberic.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                                <span class="badge text-bg-warning">Opening Sale Discount 50%</span>

                                <h2 class="text-dark display-5 fw-bold mt-4">SuperMarket For Fresh Grocery </h2>
                                <p class="lead">Introduced a new model for online grocery shopping
                                and convenient home delivery.</p>
                                <a href="#!" class="btn btn-dark mt-3">Shop Now <i class="feather-icon icon-arrow-right ms-1"></i></a>
                            </div>

                        </div>
                        <div class=" " style="background: url(../assets/images/slider/fajitas.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                            <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                                <span class="badge text-bg-warning">Free Shipping - orders over $100</span>
                                <h2 class="text-dark display-5 fw-bold mt-4">Free Shipping on <br> orders over <span class="text-primary">$100</span></h2>
                                <p class="lead">Free Shipping to First-Time Customers Only, After promotions and discounts are applied.
                                </p>
                                <a href="#!" class="btn btn-dark mt-3">Shop Now <i class="feather-icon icon-arrow-right ms-1"></i></a>
                            </div>

                        </div>

                    </div>

                    <div class="d-md-flex justify-content-between mb-3 align-items-center">
                      <div>
                        <p class="mb-3 mb-md-0">{{$products->count()}} Products found</p>
                      </div>
                      <div class="d-flex justify-content-md-between align-items-center">
                        <div class="me-2">
                          <!-- select option -->
                          <select
                            class="form-select"
                            aria-label="Default select example"
                          >
                            <option selected>Show: 50</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                          </select>
                        </div>
                        <div>
                          <!-- select option -->
                          <select
                            class="form-select"
                            aria-label="Default select example"
                          >
                            <option selected>Sort by: Featured</option>
                            <option value="Low to High">Price: Low to High</option>
                            <option value="High to Low">Price: High to Low</option>
                            <option value="Release Date">Release Date</option>
                            <option value="Avg. Rating">Avg. Rating</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- row test-->
                    <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                        @foreach($categories as $category)
                        <div class="col">
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <div class="text-center position-relative">
                                        <img src="{{ url('/storage/LOGO CARNICERIA PESCADERIA 2022.png') }}" class="mb-3 img-fluid" alt="mierda">
                                        <h4><a href="{{route('order.index',$category)}}" class="text-inherit text-decoration-none">{{$category->name}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- row -->
                    <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                        @foreach ($products as $product)
                        <div class="col">
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <div class="text-center position-relative">
                                        <!-- badge -->
                                        <div class="position-absolute top-0 start-0">
                                            <span class="badge bg-danger">Sale</span>
                                        </div>
                                        @if ($product->photos->first())
                                        <a href="{{route('product.show',$product)}}">
                                            <img src="{{asset($product->photos->first()->url)}}" alt="{{$product->photos->first()->url}}" class="mb-3 img-fluid"/>
                                        </a>
                                        @else
                                        <img src="{{ url('/storage/LOGO CARNICERIA PESCADERIA 2022.png') }}" class="mb-3 img-fluid" alt="mierda">
                                        <h4>NO PHOTOS</h4>
                                        @endif
                                        <!-- btn action -->
                                        <div class="card-product-action">
                                            <a
                                                href="{{route('product.edit',$product)}}"
                                                class="btn-action"
                                                data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"
                                                ><i
                                                class="bi bi-eye"
                                                data-bs-toggle="tooltip"
                                                data-bs-html="true"
                                                title="Quick View"
                                                ></i
                                            ></a>
                                            <a
                                                href="{{route('product.edit',$product)}}"
                                                class="btn-action"
                                                data-bs-toggle="tooltip"
                                                data-bs-html="true"
                                                title="Wishlist"
                                                ><i class="bi bi-heart"></i
                                            ></a>
                                            <a
                                                href="{{route('product.edit',$product)}}"
                                                class="btn-action"
                                                data-bs-toggle="tooltip"
                                                data-bs-html="true"
                                                title="Compare"
                                                ><i class="bi bi-arrow-left-right"></i
                                            ></a>
                                        </div>
                                    </div>
                                    <div class="text-small mb-1">
                                        <a href="{{route('product.show',$product)}}" class="text-decoration-none text-muted">
                                            <small>{{ $product->category->name}}</small>
                                        </a>
                                    </div>
                                    <h2 class="fs-6">
                                        <a href="{{route('product.show',$product)}}" class="text-inherit text-decoration-none">{{ $product->name }}</a>
                                    </h2>
                                    <div>
                                        <!-- rating -->
                                        <small class="text-warning">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </small>
                                        <!-- text -->
                                        <span class="text-muted small">4.5(149)</span>
                                    </div>
                                    <!-- price-->
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <span class="text-dark">${{$product->price}}</span>
                                            <span class="text-decoration-line-through text-muted">${{$product->price}}</span>
                                        </div>
                                        <div>
                                          <!-- btn -->
                                          <a href="#!" class="btn btn-primary btn-sm">
                                                <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-plus"
                                                >
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg>
                                                Add
                                            </a
                                          >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
