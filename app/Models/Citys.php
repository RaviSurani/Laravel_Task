<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    use HasFactory;
    protected $fillable = [
        "city",
        "state_id",
        "created_by",
        "modified_by",
    ];

    public function States()
    {
        return $this->belongsTo(States::class, 'state_id', 'id');
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
