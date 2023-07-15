<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'sliders';
    protected $fillable = [
        'image',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
