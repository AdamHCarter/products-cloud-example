<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // special property allows mass assignment, or more than one at a time
    protected $fillable = ['name', 'price', 'description', 'item_number', 'image'];

    public static function search($search) {
        return self::where('name', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->orWhere('item_number', $search);
    }
}
