<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderId',
        'status',
        'region',
        'full_name',
        'phone',
        'gender',
        'address',
        'address_comment',
        'status_comment',
        'sum',
        'discount_amount',
        'total_sum',
        'purchase_sum',
    ];

    protected $casts = [
        'sum' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_sum' => 'decimal:2',
        'purchase_sum' => 'decimal:2',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_db_id', 'id');
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
