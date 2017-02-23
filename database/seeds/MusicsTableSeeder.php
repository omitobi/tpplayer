<?php

use App\User;
use App\Music;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MusicsTableSeeder extends Seeder
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
        DB::table('musics')->delete();

        $musics = [
            ['user_id' => 0, 'link' => 'http://lgfkc.gcichurches.org/worshipmusic/mp3/This is Amazing Grace - Phil Wickham.mp3',
                'name' => 'This is Amazing Grace - Phil Wickham', 'duration' => '00:00'],
            ['user_id' => 1, 'link' => 'http://lgfkc.gcichurches.org/worshipmusic/mp3/Because He Lives - Matt Maher.mp3',
                'name' => 'Because He Lives - Matt Maher', 'duration' => '00:00'],
        ];

        foreach ($musics as $music)
        {
            Music::create($music);
        }
        Model::reguard();
        //
    }
}
