<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebsiteModel;

class WebsiteDatabase extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah data sudah ada, jika tidak, insert secara manual sebagai fallback
        $websites = [
            [
                'nama_web' => 'Example Website 1',
                'url' => 'https://example1.com'
            ],
            [
                'nama_web' => 'Example Website 2',
                'url' => 'https://example2.com'
            ],
            [
                'nama_web' => 'Example Website 3',
                'url' => 'https://example3.com'
            ],
        ];

        foreach ($websites as $website) {
            $existing = WebsiteModel::where('url', $website['url'])->first();
            if (!$existing) {
                WebsiteModel::create($website);
            }
        }
    }
}
