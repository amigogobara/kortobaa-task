<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::insert([
            [
                'name' => 'kortobaa Store',
                'url'  => 'https://store.kortobaa.com'
            ],
            [
                'name' => 'Ahmed Store',
                'url'  => 'https://store.ahmed.com'
            ]
        ]);
    }
}
