<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageMovements extends Model
{
    use HasFactory;
    protected $table = 'storage_movements';
    protected $fillable = ['storage_id', 'quantity', 'type', 'movement_date'];

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}
