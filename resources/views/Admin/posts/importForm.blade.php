@extends('Layouts.master')

@section('content')
<section style="padding:100px 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Import
                        </div>
                        <div class="card-body">
                            <form action="{{ route('posts.import-excel') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group my-2">
                                    <label for="formFile" class="form-label">Choose File</label>
                                    <input class="form-control" type="file" id="formFile" name="file">
                                </div>
                                <button class="btn btn-success">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection