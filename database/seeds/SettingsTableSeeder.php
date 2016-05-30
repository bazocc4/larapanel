<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'title',
                'value' => 'Creazi Citra Cemerlang',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'keywords',
                'value' => 'creative, business, solution',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'description',
                'value' => 'Your website summary here.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'date_format',
                'value' => 'd M Y',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'time_format',
                'value' => 'h:i A',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'language',
                'value' => 'id_indonesia
en_english
zh_chinese',
                'created_at' => NULL,
                'updated_at' => '2016-05-30 16:19:36',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'google_analytics_code',
                'value' => 'UA-33194544-1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'homepage_share',
                'value' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'display_width',
                'value' => '3200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'display_height',
                'value' => '1800',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'display_crop',
                'value' => '0',
                'created_at' => NULL,
                'updated_at' => '2016-05-30 16:21:06',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'thumb_width',
                'value' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'thumb_height',
                'value' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'thumb_crop',
                'value' => '0',
                'created_at' => NULL,
                'updated_at' => '2016-05-30 16:21:06',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'overwrite_image',
                'value' => 'enable',
                'created_at' => NULL,
                'updated_at' => '2016-05-30 16:21:06',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'custom-pagination',
                'value' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'custom-email_contact',
                'value' => 'andybasuki88@gmail.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
