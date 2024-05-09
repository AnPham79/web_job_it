@extends('Layouts.master')

@section('content')
    <div>
        <style>
            nav svg {
                height: 20px;
            }

            nav .hidden {
                display: block !important;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="fw-bold">{{ $title }}</h2>
                                </div>
                                <div class="col-md-6 float-end">
                                    <a href="" class="btn btn-success float-end mx-1">Add
                                        new
                                    </a>
                                    <form action="{{ route('employee.export-csv') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success float-end mx-1">
                                            Export CSV
                                        </button>
                                    </form>
                                    <form action="{{ route('employee.export-excel') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success float-end mx-1">
                                            Export Excel
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" class="form-horizontal my-4" id="form-filter">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-select px-4 rounded-pill bg-light border-0 shadow-sm select-filter" aria-label="Default select example" name="role" id="role">
                                    <option value="All" selected>All Roles</option>
                                    <option value="Applicant">Applicant</option>
                                    <option value="HR">HR</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select px-4 rounded-pill bg-light border-0 shadow-sm select-filter" aria-label="Default select example" name="city" id="city">
                                    <option value="">All Cities</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select px-4 rounded-pill bg-light border-0 shadow-sm select-filter" aria-label="Default select example" name="company" id="company">
                                    <option value="">All Companies</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table class="table table-triped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Info</th>
                                    <th>Role</th>
                                    <th>City</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ $item->avatar }}" alt="" style="height: 100px;"></td>
                                        <td>{{ $item->name }} - {{ $item->getGender() }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="mailto::{{ $item->email }}">
                                                {{ $item->email }}
                                            </a>
                                            <br>
                                            <a href="tel::{{ $item->phone }}">
                                                {{ $item->phone }}
                                            </a>
                                        </td>
                                        <td>{{ $item->role }}</td>
                                        <td>{{ $item->city }}</td>
                                        <!-- sử lí trường hợp không có company -->
                                        <td>{{  optional($item->company)->name }}</td>
                                        <td>
                                            <form action="{{ route('employee.destroy-employee', ['id'=> $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-light" type="submit"><i class="fa-solid fa-trash text-danger mx-1"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectFilters = document.querySelectorAll('.select-filter');

            selectFilters.forEach(function(selectFilter) {
                selectFilter.addEventListener('change', function (event) {
                    event.preventDefault();

                    document.getElementById('form-filter').submit();
                });
            });
        });
    </script>
@endpush