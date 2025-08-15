<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tenant1 = \App\Models\Tenant::create(['name' => 'Tenant 1', 'domain' => 'tenant1.local']);
        $tenant2 = \App\Models\Tenant::create(['name' => 'Tenant 2', 'domain' => 'tenant2.local']);

        \App\Models\User::create([
            'name' => 'Admin One',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password'),
            'tenant_id' => $tenant1->id
        ]);

        \App\Models\User::create([
            'name' => 'Admin Two',
            'email' => 'admin2@example.com',
            'password' => bcrypt('password'),
            'tenant_id' => $tenant2->id
        ]);
    }
}
