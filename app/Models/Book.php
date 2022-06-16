<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    /**
     * Get the reserves for the book.
     */
    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    /**
     * Check if the book is reserved and not returned.
     *
     * @return boolean
     */
    public function getIsReservedAttribute()
    {
        return $this->reserves()->where('returned', false)->count() > 0;
    }
}
