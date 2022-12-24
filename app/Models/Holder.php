<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'identifier',
        'birth_date',
        'phone'
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
