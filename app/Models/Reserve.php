<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'time'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'returned' => false,
    ];

    /**
     * Get the book of this reserve.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the user of this reserve.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
