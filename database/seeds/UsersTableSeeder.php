<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    protected $faker;

    public function __construct(Faker\Generator $faker) {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('users')->delete();
        $users = [
            ['name' => $this->faker->name, 'email' => $this->faker->companyEmail, 'password' => bcrypt('password') ],
            ['name' => $this->faker->name, 'email' => 'omisakin.oluwatobi@gmail.com', 'password' => bcrypt('password') ],
            ['name' => $this->faker->name, 'email' => $this->faker->companyEmail, 'password' => bcrypt('password') ],
            ['name' => $this->faker->name, 'email' => $this->faker->companyEmail, 'password' => bcrypt('password') ],
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
        Model::reguard();
    }
}
