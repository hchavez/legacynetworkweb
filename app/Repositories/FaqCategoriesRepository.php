<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\FaqCategories;

class FaqCategoriesRepository extends Repository
{
    function model()
    {
        return FaqCategories::class;
    }
}