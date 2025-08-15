<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use App\Models\Tenant;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        static::creating(function ($model) {
            if (App::bound(Tenant::class)) {
                $tenant = App::make(Tenant::class);
                $model->tenant_id = $tenant->id;
            }
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            if (App::bound(Tenant::class)) {
                $tenant = App::make(Tenant::class);
                $builder->where('tenant_id', $tenant->id);
            }
        });
    }
}

