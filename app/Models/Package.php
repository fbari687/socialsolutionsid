<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    use Sluggable;
    public function sluggable(): array
    {

        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'package_id');
    }
}
