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
        
        public static function string_unslug($text)
        {
            return ucwords(str_replace(array('_', '-'), ' ', $text));
        }
        
        /**
         * Get either a Gravatar URL or complete image tag for a specified email address.
         *
         * @param string $email The email address
         * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
         * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
         * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
         * @param boole $img True to return a complete IMG tag False for just the URL
         * @param array $atts Optional, additional key/value attributes to include in the IMG tag
         * @return String containing either just a URL or a complete image tag
         * @source http://gravatar.com/site/implement/images/php/
         */
        public static function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() )
        {
            $url = 'http://www.gravatar.com/avatar/';
            $url .= md5( strtolower( trim( $email ) ) );
            $url .= "?s=$s&d=$d&r=$r";
            if ( $img ) {
                $url = '<img src="' . $url . '"';
                foreach ( $atts as $key => $val )
                    $url .= ' ' . $key . '="' . $val . '"';
                $url .= ' />';
            }
            return $url;
        }
        
        /**
        * convert formatted language to display language
        * @param string $src contains source language want to be converted
        * @return string $result contains language that can be published
        * @public
        **/
        public static function parse_lang($src = NULL)
        {
            return array_map(function($value){
                $value = trim($value);
                return strtoupper(substr($value, 0,2))." - ".ucwords(substr($value, 3));
            }, explode(chr(10), $src));
        }
        
        public static function unparse_lang($src = NULL)
        {
            return strtolower( substr($src,0,2).'_'.substr($src,5) );
        }
    }
?>