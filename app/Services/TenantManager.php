<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Support\Facades\App;

class TenantManager
{
    protected $tenant;

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
        App::instance(Tenant::class, $tenant);
    }

    public function getTenant()
    {
        return $this->tenant;
    }

    public function loadTenantByDomain($domain)
    {
        $tenant = Tenant::where('domain', $domain)->first();

        if ($tenant) {
            $this->setTenant($tenant);
        }
    }
}

