@extends('layouts.theme.main')
@section('content')
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
@endsection
