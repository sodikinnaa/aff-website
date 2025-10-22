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
                            <a href="{{ route('users.form') }}" class="btn btn-primary d-inline-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 5v14" />
                                    <path d="M5 12h14" />
                                </svg>
                                Tambah User
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER -->
        <!-- BEGIN PAGE BODY -->
        <main id="content" class="page-body">
            <div class="container-xl">
                {{-- TANGKAP DAN TAMPILKAN SEMUA PESAN DARI SESSION FLASH --}}
                @foreach (['success', 'error', 'warning', 'info'] as $msg)
                    @if(session($msg))
                        <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
                            <div class="alert-icon">
                                @if($msg === 'success')
                                <!-- icon success -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" class="icon alert-icon icon-2">
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                                @elseif($msg === 'error')
                                <!-- icon error -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" class="icon alert-icon icon-2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                                @elseif($msg === 'warning')
                                <!-- icon warning -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" class="icon alert-icon icon-2">
                                    <path d="M12 9v2m0 4h.01m-.01-8a9 9 0 1 0 9 9 9 9 0 0 0-9-9z"></path>
                                </svg>
                                @elseif($msg === 'info')
                                <!-- icon info -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" class="icon alert-icon icon-2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                @endif
                            </div>
                            <div>
                                @if($msg === 'success')
                                    <h4 class="alert-heading">Berhasil!</h4>
                                @elseif($msg === 'error')
                                    <h4 class="alert-heading">Gagal!</h4>
                                @elseif($msg === 'warning')
                                    <h4 class="alert-heading">Peringatan!</h4>
                                @elseif($msg === 'info')
                                    <h4 class="alert-heading">Info</h4>
                                @endif
                                <div class="alert-description">{!! session($msg) !!}</div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    @endif
                @endforeach

                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-secondary">
                                    Show
                                    <form method="GET" id="perPageForm" class="d-inline">
                                        <select name="perPage" class="form-select form-select-sm mx-2 d-inline-block" style="width:auto;display:inline;" onchange="document.getElementById('perPageForm').submit()">
                                            @php
                                                $perPageOptions = [5, 10, 20, 50, 100];
                                                $currentPerPage = request()->query('perPage', 10);
                                            @endphp
                                            @foreach($perPageOptions as $option)
                                                <option value="{{ $option }}" {{ $currentPerPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                        entries
                                        @foreach(request()->except('perPage', 'page') as $key => $value)
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                        @endforeach
                                    </form>
                                </div>
                                <div class="ms-auto text-secondary">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" aria-label="Search user" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-selectable card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Nama</th>
                                        <th>Whatsapp</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                      
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $startNumber = 1;
                                    @endphp
                                    @forelse($users as $i => $user)
                                        <tr>
                                            <td>{{ $startNumber + $i }}</td>
                                            <td>{{ $user['name'] }}</td>
                                            <td>
                                                <a href="https://wa.me/{{ $user['whatsapp'] }}" target="_blank" class="text-decoration-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp text-success" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M3 21l1.65 -4.3a9 9 0 1 1 3.4 3.4l-4.3 1.65" />
                                                        <path d="M8 16l-1.5 -2a6 6 0 0 1 8.5 -8.5l2 1.5" />
                                                        <path d="M16 8l2 1.5" />
                                                    </svg>
                                                    {{ $user['whatsapp'] }}
                                                </a>
                                            </td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['role'] }}</td>
                                            @if($user['role'] !== 'admin')
                                              <td>
                                                    {{ $user['products_count'] }}
                                              </td>
                                            @endif
                                            <td>
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-start">
                                                     
                                                        <a class="dropdown-item" href="{{ url('/admin/users/edit/' . $user['id']) }}">Edit</a>
                                                        <form method="POST" action="/admin/users/delete/{{ $user['id'] }}" class="d-inline delete-user-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button 
                                                                type="submit" 
                                                                class="dropdown-item text-danger btn-delete-user" 
                                                                onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { this.closest('form').submit(); }"
                                                                >
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-secondary">Belum ada user.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row g-2 justify-content-center justify-content-sm-between">
                                <div class="col-auto d-flex align-items-center">
                                    <p class="m-0 text-secondary">
                                        Showing 
                                        <strong>1</strong>
                                        to 
                                        <strong>{{ count($users) }}</strong>
                                        of 
                                        <strong>{{ count($users) }} entries</strong>
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <!-- DUMMY PAGINATION -->
                                    <ul class="pagination m-0 ms-auto">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
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
                                                    class="icon icon-1"
                                                >
                                                    <path d="M15 6l-6 6l6 6" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
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
                                                    class="icon icon-1"
                                                >
                                                    <path d="M9 6l6 6l-6 6" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- END DUMMY PAGINATION -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- END PAGE BODY -->
        <!-- BEGIN FOOTER -->
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <nav aria-label="Footer">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="https://docs.tabler.io" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                            <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                            <li class="list-inline-item">
                            <a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a>
                            </li>
                            <li class="list-inline-item">
                            <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
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
                                class="icon text-pink icon-inline icon-4"
                                >
                                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                                Sponsor
                            </a>
                            </li>
                        </ul>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright &copy; 2025
                            <a href="." class="link-secondary">Tabler</a>. All rights reserved.
                        </li>
                        <li class="list-inline-item">
                            <a href="./changelog.html" class="link-secondary" rel="noopener"> v1.4.0 </a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--  END FOOTER  -->
</div>
@endsection