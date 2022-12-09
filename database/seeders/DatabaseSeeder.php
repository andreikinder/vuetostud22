<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //User::factory(10)->create();

//        Status::factory(40)->state(new Sequence(
//            fn($sequence) => ['user_id' => User::all()->random()]      ))->create();

         Testimonial::factory(40)->state(new Sequence(
             fn($sequence) => ['user_id' => User::all()->random()]      ))->create();


//        $users = User::factory()
//            ->count(10)
//            ->state(new Sequence(
//                fn ($sequence) => ['role' => UserRoles::all()->random()],
//                ))
//            ->create();
    }
}
