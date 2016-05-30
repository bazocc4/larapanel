<?php
    $link = url( Request::segment(1) );
    $total_segments = count(Request::segments());
?>
<ul class="breadcrumb">
    <li><a href="{{ $link }}">{{ $mySetting['title'] }}</a></li>
    <?php
        for($i = 2 ; $i < $total_segments ; ++$i)
        {
            $link .= "/" . Request::segment($i);
            
            echo '<li><a href="'.$link.'">'.Helper::string_unslug(Request::segment($i)).'</a></li>';
        }
    ?>
    <li class="active">{{ Helper::string_unslug(Request::segment($total_segments)) }}</li>
</ul>