<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::find(1);
        if($tenant != null){
            User::create([
                'name' => 'ahmed salim',
                'email' => 'ahmed_salim@rocketmail.com',
                'password' => bcrypt(12345678),
                'email_verified_at' => now(),
                'tenant_id' => $tenant->id,
                'is_admin' => 1
            ]);
        }
    }
}
