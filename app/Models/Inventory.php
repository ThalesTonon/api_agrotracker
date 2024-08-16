<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $fillable = ['name', 'quantity', 'price', 'expiration_date', 'user_id'];

    // Definir o relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
