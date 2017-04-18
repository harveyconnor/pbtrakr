<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Still need to add in appropriate descriptions (get of IAAF or an accredited site).
         * */
        $events = [
            /*['name','description','id']*/
            /*Sprints*/
            ['100m','',1],
            ['200m','',1],
            ['400m','',1],
            /*Middle Distance*/
            ['800m','',2],
            ['1500m','',2],
            /*Long Distance*/
            ['3000m','',3],
            ['5000m','',3],
            ['10000m','',3],
            ['3000m Steeple Chase','',3],
            /*Marathon*/
            ['Marathon','',4],
            ['Half Marathon','',4],
            ['20km Race Walk','',4],
            ['50km Race Walk','',4],
            /*Hurdles*/
            ['60mH','',5],
            ['100mH','',5],
            ['110mH','',5],
            ['400mH','',5],
            /*Horizontal Jumps*/
            ['Long Jump','',6],
            ['Triple Jump','',6],
            /*Vertical Jumps*/
            ['High Jump','',7],
            ['Pole Vault','',7],
            /*Throws*/
            ['Shot Put','',8],
            ['Discus Throw','',8],
            ['Javelin Throw','',8],
            ['Hammer Throw','',8],
            /*Decathlon etc.??*/
        ];
        foreach ($events as $event) {
            Event::create([
                'name' => $event[0],
                'description' => $event[1],
                'discipline_id' => $event[2]
            ]);
        }
    }
}
