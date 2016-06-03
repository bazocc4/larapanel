<?php
    if ($status == 0){
		/*disabled*/
		echo "<span class='label label-danger label-form'>Disabled</span>";
	} else
	if ($status == 2){
		/*deactive*/
		echo "<span class='label label-warning label-form'>Deactive</span>";
	} else
	if ($status == 3){
		/*published*/
		echo "<span class='label label-success label-form'>Published</span>";
	}else
	if ($status == 4){
		/*draft*/
		echo "<span class='label label-danger label-form'>Draft</span>";
	} else 
	if ($status == 5){
		/*done*/
		echo "<span class='label label-success label-form'>Done</span>";
	} else
	if ($status == 6){
		/*pending*/
		echo "<span class='label label-warning label-form'>Pending</span>";
	} else
	if ($status == 7){
		/*void*/
		echo "<span class='label label-primary label-form'>Void</span>";
	} else
	if ($status == 8){
		/*not active*/
		echo "<span class='label label-danger label-form'>Not Active</span>";
	}
    else{ // default status == 1
		/*active*/
		echo "<span class='label label-success label-form'>Active</span>";
	}	
?>