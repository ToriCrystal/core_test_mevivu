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
                        {{ $dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width: 900px;'], true) }}

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
        @include('admin.posts.scripts.datatable')
        {{ $dataTable->scripts() }}
        <script>
            $(document).ready(function() {
                columns = window.LaravelDataTables["postTable"].columns();
                toggleColumnsDatatable(columns);
            });
        </script>
    @endpush
