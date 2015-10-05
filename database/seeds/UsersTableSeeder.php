<?php
 
use Illuminate\Database\Seeder;
 
class UsersTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $projects = array(
            ['id' => 1, 'username' => 'admin', 'email' => 'admin@admin.com', 'password' => 'admin', 'address' => 'admin', 'handphone' => '089xx', 'role' => 'admin'],
            ['id' => 2, 'username' => 'customer', 'email' => 'customer@customer.com', 'password' => 'customer', 'address' => 'jalan ganesha no 10 Bandung', 'handphone' => '089xx', 'role' => 'customer'],
            ['id' => 3, 'username' => 'agent', 'email' => 'agent@agent.com', 'password' => 'agent', 'address' => 'jalan dago asri blok b no 30', 'handphone' => '089xx', 'role' => 'agent']
        );
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($projects);
    }
 
}