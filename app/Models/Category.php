<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property-read Collection|Category[] children
 */
class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function getLink()
    {
        return route('index',['category_id'=>$this->id]);
    }

}
