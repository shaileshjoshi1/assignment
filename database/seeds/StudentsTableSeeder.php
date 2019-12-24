<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('students')->delete();
        
        \DB::table('students')->insert(array (
            0 =>
            array (
                 "id" => 1,
				"first_name" => "dipak",
				"last_name" => "kolhe",
				"parent_name" => "ramji",
				"mobile_number" => "9988775544",
				"standard" => "11",
				"course" => "maths",
				"email_id" => "dipak44@kolhe.com",
				"document1" => "/document1/1577178497_.png",
				  "created_at" => '2019-12-20 10:10:33',
					"updated_at"=> "2019-12-24 09:08:18"
            ),
			 1 =>
			array (
                "id" => 22,
				"first_name" => "shaielsh",
				"last_name" => "joshi2",
				"parent_name" => "shaielsh",
				"mobile_number" => "1238778",
				"standard" => "2",
				"course" => "nursery2",
				"email_id" => "shailes44566h@tmr.com",
				"document1" => "/document1/1576844828_.jpg",
				  "created_at"=> "2019-12-20 12:27:08",
					"updated_at"=> "2019-12-20 12:27:08"
				

            ),
			
			
			
			
        ));
    }
}
