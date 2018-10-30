<?php
// Funzioni helpers

function gravatar_img($user_email) {
	 $gravatar_hash = md5( strtolower( trim( $user_email ))); 
     return $gravatar_hash;
}

function setActive(string $path, string $class_name = "active")
{
    return Request::path() === $path ? $class_name : "";
}