<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'account_type',
        'balance',
        'number',
        'holder_id',
    ];

    public function holder()
    {
        return $this->belongsTo(Holder::class);
    }
}
