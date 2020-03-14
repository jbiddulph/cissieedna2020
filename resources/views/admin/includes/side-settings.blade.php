<div class="col-md-4">
    @if(Session::has('catmessage'))
        <div class="alert alert-success">
            {{Session::get('catmessage')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">Product Categories</div>

        <div class="card-body">
                <ul class="category_list">
                    @foreach($categories as $category)
                        <li>
                            <strong>{{$category->category_name}}</strong>
                            <span>
                                <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCatModal{{$category->id}}">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCategoryModal"> X </button>
                            </span>
                        </li>
                    @endforeach
                    <!-- Delete Category Modal -->
                        <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('category.delete')}}" method="post" enctype="multipart/form-data">@csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">DELETE - Are you sure?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                            Do you want to delete the category <strong>{{$category->category_name}}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">NO</button>
                                            <button type="submit" class="btn btn-danger btn-sm">YES</button> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </ul>

            <small>When deleting, make sure products not linked to category</small>
            <form action="{{route('category.add')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Product Category</label>
                            <input type="text" name="category_name" id="name" class="form-control @error('height') is-invalid @enderror" value="{{ old('category_name') }}">
                            @error('height')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Add Category" class="btn btn-dark">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Category Modals -->
    @foreach($categories as $category)
        <div class="modal fade" id="editCatModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{route('category.update', [$category->id])}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category Name</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="propname">Category Name</label>
                                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $category->category_name }}">
                                @error('propname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark btn-sm">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    @if(Session::has('productmessage'))
        <div class="alert alert-success mt-4">
            {{Session::get('productmessage')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card mt-4">
        <div class="card-header">Products</div>

        <div class="card-body">
            <ul class="category_list">
                @foreach($products as $product)
                    <li>
                        <strong>{{$product->title}}</strong>
                        <span>
                            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editProductModal{{$product->id}}">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProductModal"> X </button>
                        </span>
                    </li>
                @endforeach
                <!-- Delete Product Modal -->
                    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{route('product.delete')}}" method="post" enctype="multipart/form-data">@csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">DELETE - Are you sure?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        Do you want to delete the product <strong>{{$product->title}}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">NO</button>
                                        <button type="submit" class="btn btn-danger btn-sm">YES</button> </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </ul>
        </div>
        <!-- Product Modals -->
        @foreach($products as $product)
            <div class="modal fade" id="editProductModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('product.update', [$product->id])}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Product Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @php
                                    $mainphoto = str_replace('public/', '/storage/', $product->product_image)
                                @endphp
                                <img src="{{ asset($mainphoto) }}" width="200" class="img-responsive  img-centered" alt="{{$product->title}}">
                                <div class="form-group">
                                    <label for="title">Product Name</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ $product->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cost">Product Cost</label>
                                    <input type="text" name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ $product->cost }}">
                                    @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="height">Product Height</label>
                                    <input type="text" name="height" id="height" class="form-control @error('height') is-invalid @enderror" value="{{ $product->height }}">
                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="width">Product Width</label>
                                    <input type="text" name="width" id="width" class="form-control @error('width') is-invalid @enderror" value="{{ $product->width  }}">
                                    @error('width')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Product Category</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                                        <option value="">Please select</option>
                                        @foreach(App\Category::all() as $catName)
                                            <option value="{{$catName->id}}"{{$product->category_id==$catName->id?'selected':''}}>{{$catName->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="height">Product Live</label>
                                        <label for="is_live">Live</label>
                                        <select name="is_live" class="form-control" id="is_live">
                                            <option value="0"{{$product->is_live==0?'selected':''}}>Draft</option>
                                            <option value="1"{{$product->is_live==1?'selected':''}}>Live</option>
                                        </select>
                                        @error('is_live')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Product Image</label>
                                    <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror" value="{{ old($product->product_image) }}">
                                    @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark btn-sm">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
