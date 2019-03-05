<?php

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment(['local'])) {
            factory(User::class)->create(['email' => 'johnmirra@gmail.com']);
        }
    }
}
