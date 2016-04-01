<?php 
    /**
     * Global function which can be called from anywhere within the framework app.
     **/
    namespace App\Helpers;

    class Helper
    {
        /**
         * print_r text with pre html tag
         * @param mixed $text all kind of text want to be printed
         * @return true
         * @public
         **/ 
        public static function dpr($text)
        {	
            echo '<pre>';
            print_r($text);
            echo '</pre>';
        }
        
        public static function call_dpr($text)
        {
            echo '<h3>now calling dpr:</h3>';
            self::dpr($text);
        }
    }
?>