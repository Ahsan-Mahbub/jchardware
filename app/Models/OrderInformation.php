<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInformation extends Model
{
    use HasFactory;

    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'order_information';
    protected $fillable = [
        'invoice',
        'total_ammount',
        'customer_id',
        'status',
        'name',
        'email',
        'phone',
        'address',
        'type',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}