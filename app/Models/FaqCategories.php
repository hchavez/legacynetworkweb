<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class FaqCategories extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'faq_categories';

    protected $fillable = [
        'name',
        'description',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id', 'id');
    }

}
