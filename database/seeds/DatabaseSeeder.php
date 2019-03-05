<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Database\Seeders\UserDatabaseSeeder;
use Modules\Account\Database\Seeders\AccountDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserDatabaseSeeder::class);
        $this->call(AccountDatabaseSeeder::class);

        Model::reguard();
    }
}
