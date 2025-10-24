<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\WebsiteModel;
use App\Services\WebsiteService;
use App\Models\Admin\Settings\ProdukWebsiteModel;
use App\Http\Services\WebsiteSyncService;
use App\Models\Admin\Settings\TokenModel;

class WebsiteController extends Controller
{
    protected $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
        $this->syncWebsite = new WebsiteSyncService();
    }

    public function index(Request $request){
        $perPage = $request->input('per_page', 15); // default 15 jika tidak diset
        $websites = WebsiteModel::paginate($perPage);

        return view('admin.website.index', [
            'title' => 'Daftar Website',
            'websites' => $websites
        ]);
    }

    public function showAdd(){
        return view('admin.website.form', ['title'=>'Tambah website']);
    }

    // list website produk 

    public function listWebsite(){
        // Ambil semua website yang berstatus aktif
        $websites = WebsiteModel::where('status', 'active')->get();
        // dd($websites);
        return view('admin/website/website_list', ['websites'=>$websites]);
    }

    public function listProduk($id)
    {
        // Ambil detail website berdasarkan id
        $website = WebsiteModel::findOrFail($id);

        // Ambil daftar produk berdasarkan website_id
        $produkList = ProdukWebsiteModel::where('website_id', $id)->get();
        return view('admin.website.produk_list', [
            'website' => $website,
            'produkList' => $produkList,
            'title' => 'Detail Produk Website'
        ]);
    }

    public function syncProduk($websiteId){
        // Ambil website berdasarkan ID
        $website = WebsiteModel::where('id', $websiteId)->first();
        // Dapatkan token untuk website ini menggunakan service
        $token = TokenModel::where('website_id', $websiteId)->value('token');
        if($website->status != 'active' || empty($token)){
            return redirect()->back()->with('error', $website->status != 'active' ? 'Website tidak aktif atau status tidak valid.' : 'Token Tidak ditemukan.');
        }
        
        $produkList = $this->syncWebsite->getProduct($token, $website->url);
        if (is_array($produkList)) {
            foreach ($produkList as $produk) {
                // Cek bahwa source_id ada dan tidak null (wajib)
                // updateOrCreate berdasarkan url dan source_id (pastikan keduanya dipakai sebagai "unik")
                ProdukWebsiteModel::updateOrCreate(
                    [
                        'url' => $produk['url'] ?? null,
                        'source_id' => $produk['id'], // wajib tidak null
                    ],
                    [
                        'website_id'    => $websiteId,
                        'nama_produk'   => $produk['name'] ?? null,
                        'price'         => $produk['price'] ?? null,
                        'img_url'       => $produk['image'] ?? null,
                        // Tambahkan field lain sesuai kebutuhan dan struktur $produk
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Produk berhasil disinkronkan dari website.');
        return 'sync loginc';
    }

    // end website produk 

    

    public function showEdit($id){
        $website = WebsiteModel::findOrFail($id);
        return view('admin.website.form', [
            'title' => 'Edit Website',
            'website' => $website
        ]);
    }

    public function detail($id)
    {
        $website = WebsiteModel::findOrFail($id);
        $token = $this->websiteService->getToken($id);
        return view('admin.website.detail', [
            'title' => 'Detail Website',
            'website' => $website,
            'tokens'=>$token
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        // Gunakan WebsiteService untuk menyimpan website
        $result = $this->websiteService->create($validated);
        if ($result === false) {
            return redirect()->route('admin.website')->withInput()->with('error', 'Url sudah ada.');
        }

        // Redirect ke daftar website dengan pesan sukses
        return redirect()->route('admin.website')->with('success', 'Website berhasil disimpan.');
    }

    public function destroy($id){
        $result = $this->websiteService->delete($id);
        return redirect()->route('admin.website')->withInput()->with('success', 'Website Berhasil di hapus');
    }

    public function update(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'id' => 'required|integer|exists:website,id',
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $website = WebsiteModel::findOrFail($validated['id']);

        // Update website menggunakan WebsiteService
        $this->websiteService->update($website, $validated);

        return redirect()->route('admin.website')->with('success', 'Website berhasil diperbarui.');
    }
    
}
