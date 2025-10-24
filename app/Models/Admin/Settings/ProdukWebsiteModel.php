<?php

namespace App\Models\Admin\Settings;

use Illuminate\Database\Eloquent\Model;

class ProdukWebsiteModel extends Model
{
    // Table name is 'products'
    protected $table = 'products';

    // Mass assignable attributes
    protected $fillable = [
        'nama_produk',
        'price',
        'komisi_persen',
        'url',
        'source_id',
        'website_id',
        'img_url',
        
    ];

    /**
     * The users that own this product.
     */
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_product', 'product_id', 'user_id')->withTimestamps();
    }
}
