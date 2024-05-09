@extends('layouts.master')

@section('content')

    <div class="container" style="padding: 30px 0px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="fw-bold">ADD NEW PRODUCT</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('api.posts') }}" class="btn btn-success float-end">All Products</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="" class="form-horizontal" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Product name</label>
                            <div class="col-md-7">
                                <input type="text" placeholder="Product Name" name="name_product"
                                    class="form-control input-md border border-secondary px-2" />
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Short Description</label>
                            <div class="col-md-7">
                                <textarea class="form-control" placeholder="Short Description" name="short_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Description</label>
                            <div class="col-md-7">
                                <textarea class="form-control" id="description" placeholder="Description" name="description_product"></textarea>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Regular Price</label>
                            <div class="col-md-7">
                                <input type="text" placeholder="Product price" class="form-control input-md border border-secondary px-2"
                                    name="price_product" />
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-7">
                                <input type="text" placeholder="Product Name" class="form-control input-md border border-secondary px-2" placeholder
                                    name="quantity_product" />
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">SKU</label>
                            <div class="col-md-7">
                                <input type="text" placeholder="Product Name" class="form-control input-md border border-secondary px-2"
                                    name="SKU" />
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Stock</label>
                            <div class="col-md-7">
                                <select class="form-control" name="stock_status">
                                    <option value="in_stock">In Stock</option>
                                    <option value="out_of_stock">Out Of Stock</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group row my-2">
                            <label for="" class="col-md-4 control-label">Category</label>
                            <div class="col-md-7">
                                <select class="form-control" name="category_id">
                                </select>
                            </div>
                        </div> -->

                        <div class="form-group my-2">
                            <div class="col-md-7 offset-md-4">
                                <button class="btn btn-success float-end" type="Submit">Insert Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
