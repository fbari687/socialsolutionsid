<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    public function sluggable(): array
    {

        return [
            'slug' => [
                'source' => 'package_id'
            ]
        ];
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function packages()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
