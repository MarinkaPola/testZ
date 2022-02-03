<?php

namespace Database\Seeders;

use App\Models\Bird;
use App\Models\User;
use Illuminate\Database\Seeder;

class BirdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::all()->each(function (User $user){
            $user->birds()->saveMany(Bird::factory( 2)->make());
        });
    }
}
