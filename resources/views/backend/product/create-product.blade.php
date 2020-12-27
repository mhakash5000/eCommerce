@extends('backend.layouts.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content start -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-muted">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-dark" >Home</a></li>
              <li class="breadcrumb-item active text-dark">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card">
    <div class="head bg-muted">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12  d-flex justify-content-between align-items-center">
                    <h5 class="display-5">
                         @if(isset($productsEdit))
                         Edit Product
                         @else
                         Create Product
                         @endif
                    </h5>
                  <a href="{{route('product.view')}}" class="btn btn-warning text-dark"> <i class="fa fa-list"></i> Product List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <form action="{{(@$productsEdit)?route('product.update',$productsEdit->id):route('product.store')}} " method="POST" enctype="multipart/form-data">
                @csrf
                @if(Session::has('success'))
                <div class="btn btn-success">{{Session::get('success')}} </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control-sm select2"  style="width: 100%;" name="category_id" required>
                            <option selected="selected">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(@$productsEdit->category_id==$category->id?"selected":" ")}} >{{$category->name}} </option>
                            @endforeach
                            <font style="color:red">{{($errors->has('category_id'))?($errors->first('category_id')):''}} </font>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control-sm select2"  style="width: 100%;" name="brand_id" required>
                            <option selected="selected">Select Category</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" {{(@$productsEdit->brand_id==$brand->id?"selected":" ")}}>{{$brand->name}} </option>
                            @endforeach
                            <font style="color:red">{{($errors->has('brand_id'))?($errors->first('brand_id')):''}} </font>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input class="form-control-sm" type="text" style="width: 100%;" name="name" value="{{$productsEdit->name}} " placeholder="Enter Product Name" required />
                            <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}} </font>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Color</label>
                            <select class="form-control-sm select2"  style="width: 100%;" name="color_id[]" multiple required>
                            @foreach ($colors as $color)
                                <option value="{{$color->id}}" {{(@$productsEdit->color_id==$color->id?"select2":" ")}}>{{$color->name}} </option>
                            @endforeach
                            <font style="color:red">{{($errors->has('color_id'))?($errors->first('color_id')):''}} </font>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Size</label>
                            <select class="form-control-sm select2"  style="width: 100%;" name="size_id[]" multiple required>
                                @foreach ($sizes as $size)
                                <option value="{{$size->id}} ">{{$size->name}} </option>
                            @endforeach
                            <font style="color:red">{{($errors->has('size_id'))?($errors->first('size_id')):''}} </font>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Short Description</label>
                             <textarea class="form-control" name="short_desc" id="" placeholder="Enter Your Short Description"></textarea>
                            <font style="color:red">{{($errors->has('short_desc'))?($errors->first('short_desc')):''}} </font>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Long Description</label>
                             <textarea class="form-control" name="long_desc" id="" placeholder="Enter Your Long Description" rows="4"></textarea>
                            <font style="color:red">{{($errors->has('long_desc'))?($errors->first('long_desc')):''}} </font>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Product Price</label>
                        <input class="form-control-sm" type="number" style="width: 100%;" name="price" required />
                        <font style="color:red">{{($errors->has('price'))?($errors->first('price')):''}} </font>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>Image</label>
                        <img src="{{asset('upload/user_images/')}}" id="image" style="width:445px;height:200px">
                        <input id="my-input" class="form-control" type="file" name="image" id="file" onchange="showImage(this,'image')" value=''>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Sub Image</label>
                        <input id="my-input" class="form-control" type="file" name="sub_image[]" multiple>
                        </div>
                     </div>
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" id="button" class="btn btn-success">
                    @if(isset($productsEdit))
                    Update
                    @else
                    Submit
                    @endif
                 </button>
                </div>

            </form>
        </div>
    </div>




</div>
{{-- card end --}}

  </div>
 <!-- Content Wrapper. Contains page content end-->
@endsection
