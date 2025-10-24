<?php

namespace App\Models\Admin\Settings;

use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    // Terkait tabel token_website (lihat migration 2025_10_22_025506_website.php)
    protected $table = 'token_website';

    // Mass assignable
    protected $fillable = [
        'user_id',
        'website_id',
        'token',
        'expired_at',
    ];

    // Cast tanggal
    protected $dates = [
        'expired_at',
        'created_at',
        'updated_at',
    ];

    // Relasi ke user (asumsi namespace App\Models\User)
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    // Relasi ke website
    public function website()
    {
        return $this->belongsTo(\App\Models\Admin\WebsiteModel::class, 'website_id');
    }
}
