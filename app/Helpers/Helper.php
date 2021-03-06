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
        
        public static function breakUserMetas($value)
        {
            if(is_object($value))
            {
                if(!empty($value->user_metas))
                {
                    foreach($value->user_metas as $objKey => $objValue)
                    {
                        if(!empty($objValue->value))
                        {
                            $value->user_metas->{$objValue->key} = $objValue->value;
                        }
                        
                        unset($value->user_metas[$objKey]);
                    }
                }
            }
            else
            {
                if(!empty($value['user_metas']))
                {
                    $value['user_metas'] = array_filter(array_column($value['user_metas'], 'value', 'key'));
                }
            }
            
            return $value;
        }
        
        /**
        * convert date text to selected date format from template settings
        * @param date $value contains source date
        * @param string $date contains date format selected
        * @param string $time contains time format selected
        * @return string new date format
        * @public
        **/
        public static function date_converter($value , $date , $time=NULL)
        {	
            $value = strtotime($value);
            $newDate = date($date , $value);
            $newTime = date($time , $value);
            return $newDate.(empty($time)?'':' @ '.$newTime);
        }
        
        public static function pagination_links($object)
        {
            $pagination = [
                'first' => ( $object->currentPage() > 1 ? $object->url(1) : '' ),
                'content' => $object->links(),
                'last' => ( $object->currentPage() < $object->lastPage() ? $object->url( $object->lastPage() ) : '' ),
            ];
            
            return $pagination;
        }
    }
?>