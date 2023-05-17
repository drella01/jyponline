<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Libs CSS -->
<link href={{asset("assets/libs/bootstrap-icons/font/bootstrap-icons.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/feather-webfont/dist/feather-icons.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/slick-carousel/slick/slick.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/slick-carousel/slick/slick-theme.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/simplebar/dist/simplebar.min.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/nouislider/dist/nouislider.min.css")}} rel="stylesheet">
<link href={{asset("assets/libs/tiny-slider/dist/tiny-slider.css")}} rel="stylesheet">
<link href={{asset("assets/libs/dropzone/dist/min/dropzone.min.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/prismjs/themes/prism-okaidia.min.css")}} rel="stylesheet">

<!-- Theme CSS -->
<link rel="stylesheet" href={{asset("assets/css/theme.min.css")}}>
</head>
<body>
    <div class="container">
        @if( session()->has('info') )
            <div class="alert alert-success text-center" role="alert">{{ session('info') }}</div>
        @endif
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name  ?? old('name')}}" id="name" placeholder="Introduce producto" required="">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category_id" class="form-control" id="category_id" required="">
                                @foreach (App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="store" class="form-label">Tienda</label>
                            <select name="store_id" class="form-control" id="store_id" >
                                <option value="">Selecciona tienda</option>
                                @foreach (App\Models\Store::all() as $store)
                                    <option value="{{ $store->id }}">{{ $store->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control"  value="{{ $product->price  ?? old('price')}}" name="price"  id="price" placeholder="Introduce precio" required="">
                        </div>

                        <div class="mb-5">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea type="textarea" class="form-control" value="{{ $product->description  ?? old('description')}}" name="description" id="description" placeholder="Descripcion del producto"></textarea>
                            <small class="form-text">By Signup, you agree to our <a href="#!">Terms of Service</a> & <a
                                href="#!">Privacy Policy</a></small>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Fotos</label>
                            <input type="file" class="form-control" name="photo[]" id="photo" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.theme.parts.footer')

<!-- Javascript-->
<!-- Libs JS -->
<script src={{asset("assets/libs/jquery/dist/jquery.min.js")}}></script>
<script src={{asset("assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/libs/jquery-countdown/dist/jquery.countdown.min.js")}}></script>
<script src={{asset("assets/libs/slick-carousel/slick/slick.min.js")}}></script>
<script src={{asset("assets/libs/simplebar/dist/simplebar.min.js")}}></script>
<script src={{asset("assets/libs/nouislider/dist/nouislider.min.js")}}></script>
<script src={{asset("assets/libs/wnumb/wNumb.min.js")}}></script>
<script src={{asset("assets/libs/rater-js/index.js")}}></script>
<script src={{asset("assets/libs/prismjs/prism.js")}}></script>
<script src={{asset("assets/libs/prismjs/components/prism-scss.min.js")}}></script>
<script src={{asset("assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js")}}></script>
<script src={{asset("assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js")}}></script>
<script src={{asset("assets/libs/tiny-slider/dist/min/tiny-slider.js")}}></script>
<script src={{asset("assets/libs/dropzone/dist/min/dropzone.min.js")}}></script>
<script src={{asset("assets/libs/flatpickr/dist/flatpickr.min.js")}}></script>
<script src={{asset("assets/libs/inputmask/dist/jquery.inputmask.min.js")}}></script>
<!-- Theme JS -->
<script src={{asset("assets/js/theme.min.js")}}></script>

</body>
</html>
