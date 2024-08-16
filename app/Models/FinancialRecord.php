<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'amount', 'description', 'date', 'user_id'];

    // Definir o relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
