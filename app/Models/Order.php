<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number', 'customer_name', 'customer_code',
        'tax_information', 'delivery_address', 'additional_notes',
        'current_status', 'is_archived', 'created_by',
    ];

    protected $casts = [
        'is_archived' => 'boolean',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }

    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_archived', false);
    }

    public function scopeArchived($query)
    {
        return $query->where('is_archived', true);
    }
}