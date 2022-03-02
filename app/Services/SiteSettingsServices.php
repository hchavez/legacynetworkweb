<?php

namespace App\Services;

use App\Repositories\SiteSettingsRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class SiteSettingsServices extends Services
{
    /**
     * @var SiteSettingsRepository $repository
     */
    protected $repository;

    function repository()
    {
        return SiteSettingsRepository::class;
    }
    
}