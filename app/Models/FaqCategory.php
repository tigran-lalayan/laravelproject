<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';
    protected $fillable = ['name'];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}

