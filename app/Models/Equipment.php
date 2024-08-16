<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'acquisition_date', 'user_id'];

    // Definir o relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
