<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('images')->delete();
        
        \DB::table('images')->insert(array (
            0 =>
            array (
				"image_id" => 6,
				 "id" => 1,
				"document2" => "/document2/1577178498_.jpg",
				"created_at"=> '2019-12-20 10:10:33',
					"updated_at"=>"2019-12-24 09:08:18"
				
            ),
			 1 =>
			array (
				"image_id" => 7,
				 "id" => 1,
				"document2" => "/document2/1577178498_.jpg",
				"created_at"=> '2019-12-20 10:10:33',
					"updated_at"=> "2019-12-24 09:08:18"
				
            ),
			 2 =>
			array (
				"image_id" => 1,
				"id" => 22,
				"document2" => "/document2/1576844828_.jpg",
				 "created_at"=> "2019-12-20 12:27:08",
					"updated_at"=> "2019-12-20 12:27:08"
			
				
            ),
			  3 =>
			array (
				"image_id" => 2,
				 "id" => 22,
				 "document2" => "/document2/1576844829_.jpg",
				  "created_at"=> "2019-12-20 12:27:08",
					"updated_at"=> "2019-12-20 12:27:08"
				
            ),
			
        ));
    }
}
