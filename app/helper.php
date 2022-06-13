<?php

if( ! function_exists('assets') ){
    function assets($path, $secure = null)
    {
        if( ! \File::exists($path) ){
            return asset($path, $secure);
        }
        $query = \File::lastModified($path);
        return asset($path . '?' . $query, $secure);
    }
}

if( ! function_exists('o') ){
	function o($optional, $callback = null){
		return optional($optional, $callback);
	}
}


if( ! function_exists('flash_success') ){
	function flash_success($message){
		session()->flash('flash.success', $message);
	}
}

if( ! function_exists('flash_error') ){
	function flash_error($message){
		session()->flash('flash.error', $message);
	}
}

