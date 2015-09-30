<?php
 
use Illuminate\Database\Seeder;
 
class StatusTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('status')->delete();
 
        $projects = array(
            ['id' => 1, 'status' => 'In Queue'],
            ['id' => 2, 'status' => 'Printed'],
            ['id' => 3, 'status' => 'Delivered']
        );
 
        // Uncomment the below to run the seeder
        DB::table('status')->insert($projects);
    }
 
}