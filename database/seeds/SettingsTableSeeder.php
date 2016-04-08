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
        ));
        
        
    }
}
