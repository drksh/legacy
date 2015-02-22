<?php

function has_disk_space()
{
	$diskspace = disk_free_space('/');
	$diskspace = number_format($diskspace/1048576, 1, null, '');
	return $diskspace > 100;
}
