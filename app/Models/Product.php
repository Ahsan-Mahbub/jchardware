<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'product_name',
        'slug',
        'price',
        'discount',
        'main_price',
        'details',
        'image',
        'image2',
        'image3',
        'image4',
        'status',
        'feature',
        'stock',
        'sale',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($product) {
            $product->slug = $product->generateSlug($product->product_name);
            $product->save();
        });
    }
    private function generateSlug($product_name)
    {
        if (static::whereSlug($slug = Str::slug($product_name))->exists()) {
            $max = static::whereName($product_name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
