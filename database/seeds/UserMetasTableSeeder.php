<?php

use Illuminate\Database\Seeder;

class UserMetasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_metas')->delete();
        
        \DB::table('user_metas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3,
                'key' => 'gender',
                'value' => 'Male',
                'created_at' => '2016-05-31 14:41:36',
                'updated_at' => '2016-05-31 14:41:36',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'key' => 'dob',
                'value' => '2016-05-31',
                'created_at' => '2016-05-31 14:41:36',
                'updated_at' => '2016-05-31 14:41:36',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'key' => 'job',
                'value' => 'Developer',
                'created_at' => '2016-05-31 14:41:36',
                'updated_at' => '2016-05-31 14:41:36',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'key' => 'gender',
                'value' => 'Female',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 4,
                'key' => 'address',
                'value' => 'Baruk Utara 7',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'key' => 'city',
                'value' => 'Surabaya',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'key' => 'phone',
                'value' => '081 737 5678',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 4,
                'key' => 'dob',
                'value' => '2016-05-13',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 5,
                'key' => 'gender',
                'value' => 'Male',
                'created_at' => '2016-06-01 16:32:01',
                'updated_at' => '2016-06-01 16:32:01',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 5,
                'key' => 'address',
                'value' => 'DHI 43',
                'created_at' => '2016-06-01 16:32:01',
                'updated_at' => '2016-06-01 16:32:01',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 5,
                'key' => 'city',
                'value' => 'Surabaya',
                'created_at' => '2016-06-01 16:32:01',
                'updated_at' => '2016-06-01 16:32:01',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 5,
                'key' => 'phone',
                'value' => '081 737 5678',
                'created_at' => '2016-06-01 16:32:01',
                'updated_at' => '2016-06-01 16:32:01',
            ),
        ));
        
        
    }
}
