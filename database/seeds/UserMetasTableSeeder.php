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
                'id' => 4,
                'user_id' => 4,
                'key' => 'gender',
                'value' => 'Female',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            1 => 
            array (
                'id' => 5,
                'user_id' => 4,
                'key' => 'address',
                'value' => 'Baruk Utara 7',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            2 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'key' => 'city',
                'value' => 'Surabaya, Indonesia',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            3 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'key' => 'phone',
                'value' => '081 737 5678',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            4 => 
            array (
                'id' => 8,
                'user_id' => 4,
                'key' => 'dob',
                'value' => '2016-05-13',
                'created_at' => '2016-05-31 14:45:07',
                'updated_at' => '2016-05-31 14:45:07',
            ),
            5 => 
            array (
                'id' => 13,
                'user_id' => 1,
                'key' => 'gender',
                'value' => 'Male',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 14,
                'user_id' => 2,
                'key' => 'gender',
                'value' => 'Female',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 27,
                'user_id' => 1,
                'key' => 'address',
                'value' => 'Jl. Puncak Kertajaya',
                'created_at' => '2016-06-20 10:24:50',
                'updated_at' => '2016-06-20 10:24:50',
            ),
            8 => 
            array (
                'id' => 28,
                'user_id' => 1,
                'key' => 'city',
                'value' => 'Surabaya',
                'created_at' => '2016-06-20 10:24:50',
                'updated_at' => '2016-06-20 10:24:50',
            ),
            9 => 
            array (
                'id' => 29,
                'user_id' => 1,
                'key' => 'phone',
                'value' => '081 7525 5381',
                'created_at' => '2016-06-20 10:24:50',
                'updated_at' => '2016-06-20 10:24:50',
            ),
            10 => 
            array (
                'id' => 30,
                'user_id' => 1,
                'key' => 'dob',
                'value' => '1988-10-28',
                'created_at' => '2016-06-20 10:24:51',
                'updated_at' => '2016-06-20 10:24:51',
            ),
            11 => 
            array (
                'id' => 31,
                'user_id' => 1,
                'key' => 'job',
                'value' => 'Programmer',
                'created_at' => '2016-06-20 10:24:51',
                'updated_at' => '2016-06-20 10:24:51',
            ),
            12 => 
            array (
                'id' => 32,
                'user_id' => 2,
                'key' => 'address',
                'value' => 'Avenue Road 53th',
                'created_at' => '2016-06-20 10:27:06',
                'updated_at' => '2016-06-20 10:27:06',
            ),
            13 => 
            array (
                'id' => 33,
                'user_id' => 2,
                'key' => 'city',
                'value' => 'Los Angeles, USA',
                'created_at' => '2016-06-20 10:27:06',
                'updated_at' => '2016-06-20 10:27:06',
            ),
            14 => 
            array (
                'id' => 34,
                'user_id' => 2,
                'key' => 'phone',
                'value' => '+155 994 04890',
                'created_at' => '2016-06-20 10:27:06',
                'updated_at' => '2016-06-20 10:27:06',
            ),
            15 => 
            array (
                'id' => 35,
                'user_id' => 2,
                'key' => 'dob',
                'value' => '1980-11-02',
                'created_at' => '2016-06-20 10:27:06',
                'updated_at' => '2016-06-20 10:27:06',
            ),
        ));
        
        
    }
}
