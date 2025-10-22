@extends('layouts.admin')
@section('title', $title)

@section('content')
<div class="page-wrapper">
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
                          <form action="/admin/mayar/sync" method="GET" class="d-inline">
                              @csrf
                              <button type="submit" class="btn btn-primary btn-5">
                                  <!-- Download SVG icon from http://tabler.io/icons/icon/refresh -->
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
                                      <path d="M4 4v5h.582M20 20v-5h-.581" />
                                      <path d="M5.077 19A9 9 0 1 0 6 5.3L4 9h5" />
                                  </svg>
                                  Singkronisasikan Produk
                              </button>
                          </form>
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
                  </div>
                  </div>
              </div>
              <!-- BEGIN PAGE BODY -->
            <main id="content" class="page-body">
                <div class="container-xl">
                  

                  @if(session('status') == 'delete' && session('message'))
                  <div class="alert alert-important alert-info alert-dismissible" role="alert">
                    <div class="alert-icon">
                      <!-- Download SVG icon from http://tabler.io/icons/icon/info-circle -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" class="icon alert-icon icon-2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                      </svg>
                    </div>
                    <div>
                      <h4 class="alert-heading">{{ session('message') }}</h4>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif
                  <!-- DATA KELAS DAN SISWA -->
                  <div class="col-12">
                      <div class="card">
                    
                      {{-- DUMMYKAN DATA PAGINATION --}}
                      @php
                          // Dummy data products dan paginasi
                          $dummyProducts = collect([
                              (object)[
                                  'nama_produk' => 'Paket A',
                                  'harga' => 150000,
                                  'users_count' => 40,
                                  'slug' => 'paket-a',
                                  'id' => 1,
                              ],
                              (object)[
                                  'nama_produk' => 'Paket B',
                                  'harga' => 250000,
                                  'users_count' => 33,
                                  'slug' => 'paket-b',
                                  'id' => 2,
                              ],
                              (object)[
                                  'nama_produk' => 'Paket C',
                                  'harga' => 450000,
                                  'users_count' => 17,
                                  'slug' => 'paket-c',
                                  'id' => 3,
                              ],
                              (object)[
                                  'nama_produk' => 'Paket D',
                                  'harga' => 99000,
                                  'users_count' => 4,
                                  'slug' => 'paket-d',
                                  'id' => 4,
                              ],
                              (object)[
                                  'nama_produk' => 'Paket E',
                                  'harga' => 300000,
                                  'users_count' => 20,
                                  'slug' => 'paket-e',
                                  'id' => 5,
                              ],
                          ]);

                          // Dummify paginasi agar tetap bisa digunakan sintaks di bawah
                          $perPage = request()->query('perPage', 5);
                          $currentPage = request()->query('page', 1);
                          $total = 12; // Misal total data ada 12

                          $allProducts = collect([]);
                          for($i = 0; $i < $total; $i++) {
                              $base = $dummyProducts[$i % count($dummyProducts)];
                              $copy = clone $base;
                              $copy->nama_produk .= ' #' . ($i+1);
                              $copy->id = $i+1;
                              $copy->slug = $base->slug.'-'.$copy->id;
                              $copy->users_count = rand(1, 50);
                              $copy->harga += $i * 1000;
                              $allProducts->push($copy);
                          }

                          $paginatedProducts = new Illuminate\Pagination\LengthAwarePaginator(
                              $allProducts->slice(($currentPage-1)*$perPage, $perPage)->values(),
                              $allProducts->count(),
                              $perPage,
                              $currentPage,
                              ['path' => request()->url(), 'query' => request()->query()]
                          );

                          // Agar variable $products yang dipakai di bawah tidak rusak
                          $products = $paginatedProducts;
                      @endphp

                      <div class="card-body border-bottom py-3">
                          <div class="d-flex">
                              <div class="text-secondary">
                                  Show
                                  <form method="GET" id="perPageForm" class="d-inline">
                                      <select name="perPage" class="form-select form-select-sm mx-2 d-inline-block" style="width:auto;display:inline;" onchange="document.getElementById('perPageForm').submit()">
                                          @php
                                              $perPageOptions = [5, 10, 20, 50, 100];
                                              $currentPerPage = request()->query('perPage', $products->perPage());
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
                                      <input type="text" class="form-control form-control-sm" aria-label="Search invoice" />
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-selectable card-table table-vcenter text-nowrap">
                          <thead>
                              <tr>
                                  <th class="w-1">No.</th>
                                  <th>Nama Produk</th>
                                  <th>Harga</th>
                                  <th>Jumlah Siswa</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                                  // Nomor urut tetap mengikuti pagination, tidak reset ke 1
                                  $startNumber = ($products->currentPage() - 1) * $products->perPage() + 1;
                              @endphp
                              @forelse($products as $i => $product)
                                  <tr>
                                      <td>{{ $startNumber + $i }}</td>
                                      <td>{{ $product->nama_produk }}</td>
                                      <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                      <td>{{ $product->users_count ?? 0 }}</td>
                                      <td class="text-start">
                                          <span class="dropdown" >
                                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                  👁 Detail
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-start">
                                                  <a class="dropdown-item" href="{{ url('/admin/products/'.$product->slug) }}">Lihat Detail Produk</a>
                                                  <a class="dropdown-item" href="{{ url('/admin/products/member/'.$product->id) }}">Lihat Seluruh Siswa</a>
                                                  <form action="{{ url('/admin/products/'.$product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                                  </form>
                                              </div>
                                          </span>
                                      </td>
                                  </tr>
                              @empty
                                  <tr>
                                      <td colspan="5" class="text-center text-secondary">Belum ada produk.</td>
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
                                  <strong>
                                      {{ ($products->total() > 0) ? (($products->currentPage() - 1) * $products->perPage() + 1) : 0 }}
                                  </strong>
                                  to 
                                  <strong>
                                      {{ ($products->total() > 0) ? (($products->currentPage() - 1) * $products->perPage() + $products->count()) : 0 }}
                                  </strong>
                                  of 
                                  <strong>
                                      {{ $products->total() }} entries
                                  </strong>
                              </p>
                          </div>
                          <div class="col-auto">
                              <!-- BEGIN PAGINATION -->
                              @php
                                  // Ambil semua query kecuali 'page' dan 'perPage'
                                  $query = request()->except(['page']);
                                  $perPage = request()->get('perPage');
                                  if ($perPage) {
                                      $query['perPage'] = $perPage;
                                  }
                                  // Helper untuk menambah query string pada url
                                  function add_query($url, $query) {
                                      if (empty($query)) return $url;
                                      $parsed = parse_url($url);
                                      $base = $parsed['path'] ?? $url;
                                      $q = [];
                                      if (isset($parsed['query'])) {
                                          parse_str($parsed['query'], $q);
                                      }
                                      $q = array_merge($q, $query);
                                      return $base . '?' . http_build_query($q);
                                  }
                              @endphp
                              <ul class="pagination m-0 ms-auto">
                                  {{-- Previous Page Link --}}
                                  <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $products->onFirstPage() ? '#' : add_query($products->previousPageUrl(), $query) }}" tabindex="-1" aria-disabled="{{ $products->onFirstPage() ? 'true' : 'false' }}">
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
                                  {{-- Pagination Elements --}}
                                  @foreach ($products->getUrlRange(
                                      max(1, $products->currentPage() - 2), 
                                      min($products->lastPage(), $products->currentPage() + 2)
                                  ) as $page => $url)
                                      <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                                          <a class="page-link" href="{{ add_query($url, $query) }}">{{ $page }}</a>
                                      </li>
                                  @endforeach
                                  {{-- Next Page Link --}}
                                  <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ !$products->hasMorePages() ? '#' : add_query($products->nextPageUrl(), $query) }}" aria-disabled="{{ !$products->hasMorePages() ? 'true' : 'false' }}">
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
                              <!-- END PAGINATION -->
                          </div>
                          </div>
                      </div>
                      </div>
                  </div>
                </div>
            </main>
            <!-- END PAGE BODY -->
    </div>
</div>
@endsection
