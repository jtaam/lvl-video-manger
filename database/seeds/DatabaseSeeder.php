<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create([
            'name' => 'Tam Jid',
            'email' => 'tam@jid.net',
            'password' => bcrypt('123456'),
            'is_active' => 1,
        ]);
        factory(User::class, 10)->create();
    }
}
