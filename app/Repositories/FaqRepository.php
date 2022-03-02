<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\Faq;
use App\Models\FaqCategories;

class FaqRepository extends Repository
{
    function model()
    {
        return Faq::class;
    }
}