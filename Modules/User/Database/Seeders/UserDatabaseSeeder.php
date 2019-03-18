<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\App;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment(['local'])) {
            factory(User::class)->create(['name' => 'User1', 'email' => 'user1@gmail.com']);
            factory(User::class)->create(['name' => 'User2', 'email' => 'user2@gmail.com']);
        }
    }
}
