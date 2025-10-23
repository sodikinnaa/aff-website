<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteModel extends Model
{
    protected $table = 'website';

    protected $fillable = [
        'nama_web',
        'url',
    ];

    /**
     * Products on this website.
     */
    public function products(): HasMany
    {
        return $this->hasMany(\App\Models\Product::class, 'website_id', 'id');
    }

    /**
     * Tokens related to this website.
     */
    public function tokens()
    {
        return $this->hasMany(\App\Models\Admin\TokenWebsiteModel::class, 'website_id', 'id');
    }
}
