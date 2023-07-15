<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductInformation extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'order_product_information';
    protected $fillable = [
        'order_id',
        'product_id',
        'category_name',
        'product_name',
        'qty',
        'price',
        'total_price',
        'product_img'
    ];
    public function orderInformation(){
        return $this->belongsTo(OrderInformation::class,'order_id');
    }
}