<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\TenantManager;

class IdentifyTenant
{
    protected $tenantManager;

    public function __construct(TenantManager $tenantManager)
    {
        $this->tenantManager = $tenantManager;
    }

    public function handle($request, Closure $next)
    {
        $host = $request->getHost();
        $this->tenantManager->loadTenantByDomain($host);

        if (!$this->tenantManager->getTenant()) {
            abort(404, 'Tenant not found.');
        }

        return $next($request);
    }
}

