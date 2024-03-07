<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name','slug','user_id','status'];

    protected $casts  = [ 'status' => Status::class,];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->category_name);
        });

        static::updating(function ($category) {
            // Check if the category_name has changed
            if ($category->isDirty('category_name')) {
                $category->slug = Str::slug($category->category_name);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
