<?php

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
        factory(App\Event::class,50)->create();
        factory(App\Ticket::class,50)->create();
        factory(App\User::class,100)->create();
    }
}
