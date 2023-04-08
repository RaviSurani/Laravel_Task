<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = [
        "customer_code",
        "customer",
        "address",
        "city",
        "pin_code",
        "state",
        "state_code",
        "country",
        "phone_no",
        "email",
        "web_address",
        "gst_no",
        "pan_no",
        "payment_terms",
        "created_by",
        "modified_by",
    ];

    public function Citys()
    {
        return $this->belongsTo(Citys::class, 'city', 'id');
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
