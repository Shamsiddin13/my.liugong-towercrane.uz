<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class LandingPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'landing_id',
        'unique_link',
        'full_link',
        'pixel_id',
        'telegram_link',
        'phone_number',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function landing(): BelongsTo
    {
        return $this->belongsTo(Landing::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now()->addHours(5);
        });

        static::created(function ($model) {
            // Generate a unique short link
            $model->unique_link = Str::random(6);

            // Update the full_link with the generated link
            $model->full_link = url('/l/' . $model->unique_link);
        });

        static::updating(function ($model) {
            $model->updated_at = now()->addHours(5);
        });
    }
}
