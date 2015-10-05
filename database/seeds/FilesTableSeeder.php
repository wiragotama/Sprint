<?php
 
use Illuminate\Database\Seeder;
 
class FilesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('files')->delete();
 
        $projects = array(
            ['id' => 1, 'filename' => 'xxx', 'filePath' => 'NA', 'uploaderContact' => '089xxx', 'agentContact'=> '088xxx', 'uploaderName' => 'customer', 'agentName' => 'agent', 'deliveryAddress' => 'xxx', 'printType' => 'doc', 'paperSize' => 'A4', 'numPages' => '5', 'harga'=>'10000', 'status'=>'In Queue', 'mime'=>''],
            ['id' => 2, 'filename' => 'yyy', 'filePath' => 'NA', 'uploaderContact' => '089xxx', 'agentContact'=> '088xxx', 'uploaderName' => 'customer', 'agentName' => 'agent', 'deliveryAddress' => 'yyy', 'printType' => 'doc', 'paperSize' => 'A4', 'numPages' => '5', 'harga'=>'10000', 'status'=>'Printed', 'mime'=>''],
            ['id' => 3, 'filename' => 'zzz', 'filePath' => 'NA', 'uploaderContact' => '089xxx', 'agentContact'=> '088xxx', 'uploaderName' => 'customer', 'agentName' => 'agent', 'deliveryAddress' => 'zzz', 'printType' => 'doc', 'paperSize' => 'A4', 'numPages' => '5', 'harga'=>'10000', 'status'=>'Delivered', 'mime'=>'']
        );
 
        // Uncomment the below to run the seeder
        DB::table('files')->insert($projects);
    }
 
}