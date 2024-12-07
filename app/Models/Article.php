<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'idTheme', 'date'];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'idTheme');
    }
}
