@extends('admin.layouts.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Danh sách baì viết') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">{{ __('Thông tin bài viết') }}</h2>
                    <x-link :href="route('admin.post.create')" class="btn btn-primary"><i
                            class="ti ti-plus"></i>{{ __('Thêm bài viết') }}</x-link>
                    <div class="col-4">
                        <form action="{{ route('admin.post.selectsearch') }}" method="get">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" name="q" placeholder="Search"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit">Tìm kiếm</button>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive position-relative">
                        <x-admin.partials.toggle-column-datatable />

                        <table class="table table-bordered" style="min-width: 900px;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Slug</th>
                                    <th>Đặc sắc</th>
                                    <th>Trạng thái</th>
                                    <th>Ảnh</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->is_featured == 1 ? 'Có' : 'Không' }}</td>
                                        <td>{{ $post->status == 1 ? 'Có' : 'Không' }}</td>
                                        <td>{{ $post->image }}</td>
                                        <td>{{ $post->excerpt }}</td>
                                        <td>{{ $post->content }}</td>
                                        <td>{{ $post->posted_at }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.post.delete', ['id' => $post->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Xóa</button>
                                            </form>

                                            <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}">Sửa</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('libs-js')
        <!-- button in datatable -->
        <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>
    @endpush

    @push('custom-js')
    @endpush
