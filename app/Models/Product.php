<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
//    use HasFactory;

    protected $fillable = [
        'name',
        'buy_price',
        'sell_price',
        'sku',
        'image_url',
        'is_active',
        'description',
    ];

    protected $casts = [
        'buy_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function landingPages(): HasMany
    {
        return $this->hasMany(Landing::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public static function getImageUrl($img)
    {
        $defaultImg = 'https://my.liugong-towercrane.uz/storage/products/No_Image_Available.jpg';
    
        if (is_null($img) || empty($img)) {
            return $defaultImg;
        }
    
        $url = 'https://my.liugong-towercrane.uz/storage/' . $img;
    
        return $url;
    }
    

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now()->addHours(5);
        });

        static::updating(function ($model) {
            $model->updated_at = now()->addHours(5);
        });
    }
}
