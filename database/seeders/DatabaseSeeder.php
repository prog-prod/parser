<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Stock;
use App\Models\StocksHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory()
//            ->create([
//                'email' => 'admin@parser.com',
//                'password' => bcrypt('admin5678'),
//                'role' => UserRoleEnum::admin()->value
//            ]);
//
//        Artisan::call('passport:install');


        StocksHistory::factory()->count(100)->create();
    }
}
