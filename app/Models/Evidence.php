<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evidence extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'category', 'image_url', 'uploaded_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}