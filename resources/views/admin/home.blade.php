@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Cissie Ednas Fancies - Admin</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Product Name</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cost">Product Cost</label>
                                    <input type="text" name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ old('cost') }}">
                                    @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_image">Product Image</label>
                                    <input type="file" name="product_image" id="product_image" class="form-control @error('product_image') is-invalid @enderror" value="{{ old('product_image') }}">
                                    @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="height">Product Height</label>
                                    <input type="text" name="height" id="height" class="form-control @error('height') is-invalid @enderror" value="{{ old('height') }}">
                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="width">Product Width</label>
                                    <input type="text" name="width" id="width" class="form-control @error('width') is-invalid @enderror" value="{{ old('width') }}">
                                    @error('width')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_image">Product Category</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                                        <option value="">Please select</option>
                                        @foreach(App\Category::all() as $catName)
                                            <option value="{{$catName->id}}">{{$catName->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="height">Product Live</label>
                                    <label for="is_live">Live</label>
                                    <select name="is_live" class="form-control" id="is_live">
                                        <option value="0">Draft</option>
                                        <option value="1">Live</option>
                                    </select>
                                    @error('is_live')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <input type="submit" value="Add Product" class="btn btn-dark">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('admin.includes.side-settings')
    </div>
</div>
@endsection
<style>
    ul.category_list {
        margin-left:0px;
        padding:0px;
    }
    ul.category_list li {
        width:100%;
        display: inline-flex;
        justify-content: space-between;
        list-style-type: none;
        border-bottom: 1px solid #e2e2e2;
        padding:10px 0px;
    }
</style>
