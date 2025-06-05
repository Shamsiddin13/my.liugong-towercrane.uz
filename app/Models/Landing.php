<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Landing extends Model
{
    use HasFactory;

    protected $table = 'landing'; // Explicitly define table name as it's singular

    protected $fillable = [
        'product_id',
        'sku',
        'title',
        'subtitle',
        'description',
        'text1',
        'text2',
        'text3',
        'text4',
        'text5',
        'text6',
        'img1',
        'img2',
        'img3',
        'img4',
        'link',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function landingPosts(): HasMany
    {
        return $this->hasMany(LandingPost::class);
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
