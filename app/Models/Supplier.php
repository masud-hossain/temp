<?php

namespace App\Models;

use App\Models\Thana;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'district_id',
        'thana_id',
        'address',
        'phone',
        'balance',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }

} //class
