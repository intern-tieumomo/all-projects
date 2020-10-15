<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
    		$this->call(flightSeeder::class);
    }
}

class userSeeder extends Seeder {
	public function run() {
		DB::table('users')->insert([
			[
				'name'     => Str::random(5),
				'email'    => Str::random(5).'@gmail.com',
				'password' => bcrypt('password')
			],
			[
				'name'     => Str::random(5),
				'email'    => Str::random(5).'@gmail.com',
				'password' => bcrypt('password')
			],
			[
				'name'     => Str::random(5),
				'email'    => Str::random(5).'@gmail.com',
				'password' => bcrypt('password')
			],
			[
				'name'     => Str::random(5),
				'email'    => Str::random(5).'@gmail.com',
				'password' => bcrypt('password')
			]
		]);
	}
}

class flightSeeder extends Seeder {
	public function run() {
		DB::table('flights')->insert([
			[
				'name' => Str::random(5),
				'from' => Str::random(5),
				'to'   => Str::random(5)
			],
			[
				'name' => Str::random(5),
				'from' => Str::random(5),
				'to'   => Str::random(5)
			],
			[
				'name' => Str::random(5),
				'from' => Str::random(5),
				'to'   => Str::random(5)
			],
			[
				'name' => Str::random(5),
				'from' => Str::random(5),
				'to'   => Str::random(5)
			]
		]);
	}
}
