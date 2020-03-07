<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 3; $i++) {
            $message = new Message;
            $message->message = $faker->paragraph(2);
            $message->photo_url = 'default.jpg';
            $message->code = sha1(Str::random(15));
            $message->save();
        }

    }
}
