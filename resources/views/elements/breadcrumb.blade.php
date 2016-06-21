<?php
    $link = url( Request::segment(1) );
    $total_segments = count(Request::segments());
?>
<ul class="breadcrumb">
    <li><a href="{{ $link }}">{{ $mySetting['title'] }}</a></li>
    <?php
        for($i = 2 ; $i < $total_segments ; ++$i)
        {
            $value = Request::segment($i);
            
            $link .= "/".$value;
            
            if( ! is_numeric($value) )
            {
                echo '<li><a href="'.$link.'">'.Helper::string_unslug($value).'</a></li>';
            }
        }
    ?>
    <li class="active">{{ Helper::string_unslug(Request::segment($total_segments)) }}</li>
</ul>