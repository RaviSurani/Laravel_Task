<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        "created_by",
        "modified_by",
    ];

    public function created_By()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function modified_By()
    {
        return $this->belongsTo(User::class, 'modified_by', 'id');
    }
}
