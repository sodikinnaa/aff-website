<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Settings\TokenModel;
use App\Models\Admin\WebsiteModel;
use App\Http\Services\WebsiteSyncService;

class TokenController extends Controller
{
    public function __construct(){
        $this->syncService = new WebsiteSyncService();
    }
    //
    public function destroyToken($id)
    {
        $token = TokenModel::find($id);

        if (!$token) {
            return redirect()->back()->with('error', 'Token tidak ditemukan.');
        }

        // Optional: check if user is authorized to delete this token

        $token->delete();
        // Ubah semua produk yang berasal dari website ini menjadi inactive (misal, kalau ada field status di tabel products)
        // Jika tabel products tidak punya field status, tambahkan dulu secara migration, atau sesuaikan field lain jika ada.
        WebsiteModel::where('id', $token->website_id)->update(['status' => 'inactive']);

        return redirect()->back()->with('success', 'Token berhasil dihapus.');
    }

    public function generateToken(Request $request)
    {
        $validated = $request->validate([
            'website_id' => 'required|integer|exists:website,id',
        ]);

        $websiteId = $validated['website_id'];
        $userId = auth()->id();

        // Check if a token already exists for this user and website
        $existingToken = TokenModel::where('user_id', $userId)
            ->where('website_id', $websiteId)
            ->first();

        if ($existingToken) {
            return redirect()
                ->back()
                ->with('warning', 'Token sudah ada untuk website ini. Silakan hapus token lama sebelum membuat yang baru.');
        }

        $token = TokenModel::create([
            'user_id'    => $userId,
            'website_id' => $websiteId,
            'token'      => \Str::random(32),
            'expired_at' => null, // unlimited lifetime
        ]);

        // Update status website menjadi inactivate (misal status = 'inactive')
        $website = WebsiteModel::find($websiteId);
        if ($website) {
            $website->status = 'inactive';
            $website->save();
        }

        return redirect()
            ->back()
            ->with('success', 'Token baru berhasil digenerate untuk website ini.');
    }

    public function checkActivation(Request $request)
    {
        $websiteId = $request->query('id');

        $website = WebsiteModel::where('id', $websiteId)->first();
        // ambil token dari id website
        $token = TokenModel::where('website_id', $websiteId)->value('token');
        
        if (!$website) {
            return redirect()->back()->with('error', 'Website tidak ditemukan.');
        }
        $verify = $this->syncService->verifyToken($token, $website->url);
        if(!$verify){
            $website->status = 'inactive';
            $website->save();
            return redirect()->back()->with('error', 'Token Tidak Sesuai');
        }
        $website->status = 'active';
        $website->save();
        return redirect()->back()->with('success', 'Status website berhasil diupdate menjadi aktif.');
        
    }

}
