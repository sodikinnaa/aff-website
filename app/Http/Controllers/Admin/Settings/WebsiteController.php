<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\WebsiteModel;
use App\Services\WebsiteService;

class WebsiteController extends Controller
{
    protected $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
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

        return view('admin.website.detail', [
            'title' => 'Detail Website',
            'website' => $website
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
