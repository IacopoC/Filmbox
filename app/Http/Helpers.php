<?php
// Funzioni helpers

function gravatar_img($user_email) {
	 $gravatar_hash = md5( strtolower( trim( $user_email ))); 
     return $gravatar_hash;
}