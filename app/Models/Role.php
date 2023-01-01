<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'name',
      'description',
    ];

    public function user() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermissionTo(string $permission): bool
    {
        return $this->permissions()->where('permission', $permission)->exists();
    }

    public function givePermissionTo(string $permission): void
    {
        $p = Permission::query()->firstOrCreate(compact('permission'));

        $this->permissions()->attach($p);
    }
}
