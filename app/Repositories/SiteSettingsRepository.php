<?php

namespace App\Repositories;

use App\Models\SiteSettings;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class SiteSettingsRepository extends Repository
{
    function model()
    {
        return SiteSettings::class;
    }

}