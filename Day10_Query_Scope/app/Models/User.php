<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy(UserScope::class)]
class User extends Model
{
    use HasFactory;
    public $timestamps = false;

    // protected static function booted(): void
    // {
    //     // static::addGlobalScope('userdetail', function (Builder $builder) {
    //     //     $builder->where('status', 1);
    //     // });
    //     static::addGlobalScope(new UserScope);
    // }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // public function scopeActive($query)
    // {
    //     return $query->where('status', 1);
    // }

    public function scopeCity($query, $cityName)
    {
        return $query->where('city', $cityName);
    }

    public function scopeSort($query)
    {
        return $query->orderBy('name', 'asc');
    }
}
