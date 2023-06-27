<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'title_fr','title_en','body_fr','body_en',
        'photo','category_id','admin_id','slug',
        'published','premium','favorite'
    ];

    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query){
        return $query->where('published', 1);
    }

    public function scopePremium($query){
        return $query->where('premium', 1);
    }

    public function scopeSimple($query){
        return $query->where('premium', 0);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
