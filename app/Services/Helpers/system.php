<?php

/**
 * Determine if there is disk space left.
 *
 * @return bool
 */
function has_disk_space()
{
	$diskspace = disk_free_space('/');
	$diskspace = number_format($diskspace / 1048576, 1, null, '');
	return $diskspace > 100;
}

/**
 * Get the maximum upload size from php.ini.
 *
 * @param bool $addUnits
 * @return mixed|string
 */
function get_max_upload_size($addUnits = false)
{
	$max_upload = (int)(ini_get('upload_max_filesize'));
	$max_post = (int)(ini_get('post_max_size'));
	$memory_limit = (int)(ini_get('memory_limit'));
	$result = min($max_upload, $max_post, $memory_limit) * 1000;

	return $addUnits ? $result . 'kB' : $result;
}
