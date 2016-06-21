<?php
	$icon_direction = "";
	if ($sort == $column)
    {
        $icon_direction = $direction;
        
		if ($direction == "desc")
        {
			$direction = "asc";
		}
        else
        {
            $direction = "desc";
		}
	}
    else
    {
		$direction = "desc"; // default sorting !!
	}
?>
{!! link_to_route( Route::currentRouteName() , $name, array_filter([
        'sort' => $column,
        'direction' => $direction,
        'search' => $search,
        'child_table' => $child_table,
    ]),[
        'class' => $icon_direction,
        'data-toggle' => 'tooltip',
        'title' => 'CLICK TO SORT',
	]
) !!}