@extends('layouts.admin')
@section('title', $title)
@section('content')

    <div class="page-wrapper">
        <!-- BEGIN PAGE HEADER -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <h1 class="page-title">{{ $title }}</h1>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/logout -->
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        aria-hidden="true"
                                        focusable="false"
                                        class="icon icon-2 me-1"
                                    >
                                        <path d="M14 8l4 4l-4 4" />
                                        <path d="M3 12h15" />
                                        <path d="M7 12v-7a2 2 0 0 1 2 -2h4" />
                                        <path d="M13 21h-4a2 2 0 0 1 -2 -2v-3" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                        <!-- BEGIN MODAL -->
                        <!-- END MODAL -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER -->
        <!-- BEGIN PAGE BODY -->
        <main id="content" class="page-body">
            <div class="container-xl">
                <!-- FORM WEBSITE (ADD/EDIT) -->
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title mb-0">
                                    {{ isset($website) ? 'Edit Website' : 'Tambah Website' }}
                                </h3>
                            </div>
                            <div class="card-body">
                                <form 
                                    action="{{ isset($website) ? route('website.edit') : route('website.add') }}" 
                                    method="POST" 
                                    autocomplete="off"
                                >
                                    @csrf
                                    @if(isset($website))
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $website->id }}">
                                    @endif

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Website</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="name" 
                                            name="name"
                                            value="{{ old('name', isset($website) ? $website->nama_web : '') }}"
                                            required
                                        >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="url" class="form-label">Url Website</label>
                                        <input 
                                            type="url" 
                                            class="form-control @error('url') is-invalid @enderror"
                                            id="url" 
                                            name="url"
                                            value="{{ old('url', isset($website) ? $website->url : '') }}"
                                            required
                                            placeholder="https://contoh.com"
                                        >
                                        @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.website') }}" class="btn btn-outline-secondary me-2">
                                            Batal
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ isset($website) ? 'Simpan Perubahan' : 'Tambah Website' }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection