<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $fillable = [
        "state",
        "country_id",
        "state_code",
        "created_by",
        "modified_by",
    ];

    public function Countries()
    {
        return $this->belongsTo(Countries::class, 'country_id', 'id');
    }

    public function created_By()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function modified_By()
    {
        return $this->belongsTo(User::class, 'modified_by', 'id');
    }
}
