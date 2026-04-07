<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'email', 'password_hash', 'department', 'is_active',
    ];

    protected $hidden = ['password_hash'];

    /**
     * Laravel usa este método para verificar la contraseña.
     * Como nuestra columna se llama password_hash (no password),
     * necesitamos decirle a Laravel cuál columna usar.
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'created_by');
    }
}
