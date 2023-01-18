<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Agency;
use App\Models\Holder;
use Database\Factories\AgencyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::factory()
            ->has(Holder::factory()
                ->has(Account::factory()
                    ->count(2), 'accounts')
                ->count(3), 'holders')
            ->count(10)
            ->create();
    }
}
