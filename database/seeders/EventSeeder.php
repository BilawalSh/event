<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'email' => 'bilawal@gmail.com',
                'subject' => 'Subject 1',
                'date' => '2022-05-27',
                'time' => '16:17:00',
            ],

            [
                'email' => 'bilawal@yahoo.com',
                'subject' => 'Subject 2',
                'date' => '2022-11-28',
                'time' => '17:17:00',
            ],
        ];

        Event::insert($events);
    }
}
