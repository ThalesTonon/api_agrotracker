<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'unitary_value',
        'entry_date',
        'expiration_date',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function movements()
    {
        return $this->hasMany(StorageMovements::class);
    }
}
