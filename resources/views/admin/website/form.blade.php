@extends('layouts.admin')
@section('title', $title)
@section('content')

    <div class="page-wrapper">
            <!-- BEGIN PAGE HEADER -->
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
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <main id="content" class="page-body">
            <div class="container-xl">
                <!-- FORM MULTI-FUNGSI: CREATE & EDIT USER -->
                @php
                    // Detect edit mode (if $user available)
                    $isEdit = isset($user) && $user;
                @endphp

                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title mb-0">
                                    {{ $isEdit ? 'Edit User' : 'Tambah User' }}
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ $isEdit ? '/admin/websites/' . $website->id : '/admin/websites' }}" method="POST" autocomplete="off">
                                    @csrf
                                    @if($isEdit)
                                        @method('PUT')
                                    @endif

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="name" 
                                            name="name"
                                            value="{{ old('name', $isEdit ? $website->name : '') }}"
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
                                            value="{{ old('url', $isEdit ? $website->url : '') }}"
                                            required
                                            placeholder="https://contoh.com"
                                        >
                                        @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="token" class="form-label">Token</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('token') is-invalid @enderror"
                                            id="token" 
                                            name="token"
                                            value="{{ old('token', $isEdit ? $website->token : '') }}"
                                            required
                                        >
                                        @error('token')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                                            <option value="user" {{ old('role', $isEdit ? ($website->role ?? 'user') : 'user') == 'user' ? 'selected' : '' }}>User</option>
                                            <option value="admin" {{ old('role', $isEdit ? ($website->role ?? '') : '') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.website') }}" class="btn btn-outline-secondary me-2">
                                            Batal
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Website' }}
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