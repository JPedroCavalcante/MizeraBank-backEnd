<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'identifier',
        'birth_date',
        'phone',
        'agency_id'
    ];

    public function accounts() : HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function agency() : BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }
}
