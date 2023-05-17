@extends('layouts.theme.main')
@section('content')
<!-- section -->
<div class="mt-8 mb-lg-14 mb-8">
    <div class='container'>
        <div class="row gx-10">
            <!-- col -->
            <aside class="col-lg-3 col-md-4 mb-6 mb-md-0"></aside>
            <section class="col-lg-9 col-md-12">
                <!-- card -->
                <div class="card mb-4 bg-light border-0">
                    <!-- card body -->
                    <div class="card-body p-9">
                        <h2 class="mb-0 fs-1">{{$products->first()->category->name}}-{{'PEDIDO '.$order->id}}</h2>
                    </<div>
                </div>
                <!-- test -->
                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                    @foreach($categories as $category)
                    <div class="col">
                        <!-- card -->
                        <div class="card card-product">
                            <div class="card-body">
                                <div class="text-center position-relative">
                                    <!--img src="{{ url('/storage/LOGO CARNICERIA PESCADERIA 2022.png') }}" class="mb-3 img-fluid" alt="mierda"-->
                                    <h4><button href="{{route('order.index')}}" class="text-inherit text-decoration-none" value="{{$category->id}}">{{$category->name}}</button></h4>
                                    <ul class='test'>
                                        @forelse (App\Models\Product::where('category_id',$category->id)->get() as $item )
                                            <li>{{$item->name}}</li>
                                        @empty
                                            <h6>No items</h6>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end test -->
                <!-- text -->
                <div class="d-lg-flex justify-content-between align-items-center">
                  <div class="mb-3 mb-lg-0">
                    <p class="mb-0"> <span class="text-dark">{{$products->count()}} </span> Products found </p>
                  </div>

                  <!-- icon -->
                  <div class="d-md-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="">

                    <a href="shop-list.html" class="active me-3"><i class="bi bi-list-ul"></i></a>
                    <a href="shop-grid.html" class=" me-3 text-muted"><i class="bi bi-grid"></i></a>
                    <a href="shop-grid-3-column.html" class="me-3 text-muted"><i class="bi bi-grid-3x3-gap"></i></a>
                    </div>
                    <div class="ms-2 d-lg-none">
                      <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas" href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-filter me-2">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                      </svg> Filters</a>
                    </div>
                  </div>

                    <div class="d-flex mt-2 mt-lg-0">
                      <div class="me-2 flex-grow-1">
                        <!-- select option -->
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Show: 50</option>
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="30">30</option>
                        </select></div>
                      <div>
                        <!-- select option -->
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Sort by: Featured</option>
                          <option value="Low to High">Price: Low to High</option>
                          <option value="High to Low"> Price: High to Low</option>
                          <option value="Release Date"> Release Date</option>
                          <option value="Avg. Rating"> Avg. Rating</option>

                        </select></div>

                    </div>

                  </div>
                </div>
                <!-- row -->
                <div class="row g-4  row-cols-1 mt-2">
                    @foreach ($products as $item)
                    <div class="{{$item->category_id}}">
                        <form action="{{route('order.update',$order)}}" method="POST">
                        @csrf
                            <div class="col" id="{{$item->id}}" hidden>
                                <!-- card -->
                                <div class="card card-product">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class=" row align-items-center">
                                            <!-- col -->
                                            <div class="col-md-4 col-12">
                                                <div class="text-center position-relative ">
                                                    <div class="text-center position-relative ">
                                                        <div class=" position-absolute top-0">
                                                            <!-- badge --> <span class="badge bg-danger">Sale</span>
                                                        </div>
                                                        <a href="{{route('product.show',$item)}}">
                                                            @if ($item->photos->first())
                                                            <!-- img --><img src="{{asset($item->photos->first()->url)}}"
                                                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid" style= "height: 200px;width: 200px; object-fit: cover;">
                                                            @else
                                                            <img src="{{ url('/storage/LOGO CARNICERIA PESCADERIA 2022.png') }}" class="mb-3 img-fluid" alt="mierda" style= "height: 200px;width: 200px; object-fit: cover;">
                                                            <h4>NO PHOTOS</h4>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12 flex-grow-1">
                                                <!-- heading -->
                                                <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{ucfirst($item->category->name)}}</small></a></div>
                                                <h2 class="fs-6"><a href="shop-single.html" class="text-inherit text-decoration-none">{{ucfirst($item->name)}}</a></h2>
                                                <div>
                                                    <!-- rating --><small class="text-warning"> <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                                                </div>
                                                <div class=" mt-6">
                                                    <!-- input -->
                                                    <div class="input-group input-spinner  ">
                                                        <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                                                        <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-md form-input   ">
                                                        <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
                                                    </div>
                                                    <!-- price -->
                                                    <div><span class="text-dark">{{'€'.$item->price}}</span> <span
                                                        class="text-decoration-line-through text-muted">{{'€'.$item->price}}</span>
                                                    </div>
                                                    <!-- btn -->
                                                    <div class="mt-3">
                                                        <a href="#!" class="btn btn-icon btn-sm btn-outline-gray-400 text-muted"
                                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="bi bi-eye"
                                                            data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                                        <a href="shop-wishlist.html" class="btn btn-icon btn-sm btn-outline-gray-400 text-muted"
                                                        data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                                            class="bi bi-heart"></i></a>
                                                        <a href="#!" class="btn btn-icon btn-sm btn-outline-gray-400 text-muted"
                                                        data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                                            class="bi bi-arrow-left-right"></i></a>


                                                    </div>
                                                    <!-- btn -->
                                                    <div class="mt-2">
                                                        <input type="submit" class="btn btn-primary " value="Add to Cart">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-shopping-bag me-2">
                                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                            </svg>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var products = {!! App\Models\Product::with('category')->get() !!};
        $(".test").hide();
        $("button").on('click',function (){
            products.forEach( element => { $("#"+element.id).attr('hidden',true);});
            alert(this.value);
            products.forEach( element => {
                if (element.category_id==this.value){
                    console.log(element.category.name);
                    $("#"+element.id).attr('hidden',false);
                } else {
                    console.log('de que coño vas!!');
                }
            });
        });
    });
</script>
@endsection
