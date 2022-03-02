<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Faq extends Model implements Auditable
{
    use SoftDeletes, SearchableTrait;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'faq';

    protected $fillable = [
        'category_id',
        'question',
        'short_answer',
        'long_answer',
    ];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'faq.question' => 10,
        ],

    ];

}
