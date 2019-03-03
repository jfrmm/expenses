<?php

use Illuminate\Database\Seeder;

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
            factory(App\User::class)->create(['email' => 'johnmirra@gmail.com']);
        }
    }
}
