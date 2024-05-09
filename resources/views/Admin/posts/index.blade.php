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
                                <h2 class="fw-bold">POSTS MANAGER</h2>
                            </div>
                            <div class="col-md-6 float-end">
                                <a href="" class="btn btn-success float-end mx-1">Add
                                        new
                                    </a>
                                <form action="{{ route('posts.export-csv') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success float-end mx-1">
                                        Export CSV
                                    </button>
                                </form>
                                <form action="{{ route('posts.export-excel') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success float-end mx-1">
                                        Export Excel
                                    </button>
                                </form>
                                <form action="{{ route('posts.form-import-excel') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success float-end mx-1">
                                        Import Excel
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <table class="table table-striped" id="table-posts">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th>Remotable</th>
                                <th>Is Part-time</th>
                                <th>Range Salary</th>
                                <th>Date Range</th>
                                <th>Status</th>
                                <th>Is Pinned</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->job_title }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->remote ? 'Yes' : 'No' }}</td>
                                    <td>{{ $item->is_parttime ? 'Yes' : 'No' }}</td>
                                    <td>${{ $item->min_salary }} - ${{ $item->max_salary }}</td>
                                    <td>{{ $item->start_date }} to {{ $item->end_date }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->is_pinned ? 'Yes' : 'No' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- @push('js')
    <script>
        $(document).ready(function () {
        // Lấy CSRF token từ meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Gửi AJAX request với CSRF token
            $.ajax({
                url: '{{ route('api.posts') }}',
                type: 'GET',
                dataType: 'json',
                data: { param1: 'value1', param2: 'value2', _token: csrfToken }, // Bao gồm CSRF token ở đây
                success: function (data) {
                    // Xử lý dữ liệu trả về
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi nếu có
                    console.error('Lỗi:', error);
                }
            });
        });

    </script>
@endpush -->