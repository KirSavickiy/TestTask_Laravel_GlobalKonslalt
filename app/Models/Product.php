<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'article',
        'name',
        'status',
        'data',
        'user_id'
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    protected $dates = ['deleted_at'];

    public function scopeStatus(Builder $query, $status):void
    {
        $query->where('status', $status);
    }
}
