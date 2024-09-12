<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model {
    use HasFactory;

    public function translate(): HasMany {
        return $this->hasMany(PostTranslate::class, 'post_id', 'id');
    }

    public function translated(): HasMany {
        return $this->translate()->where('lang', session('locale'));
    }
}
