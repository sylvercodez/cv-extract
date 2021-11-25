<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if ( ! function_exists('asset_url()')){
        function asset_url($add=''){
            return base_url().'assets/'.$add;
        }
    }
    if ( ! function_exists('asset2_url()')) {
        function asset2_url($add = '')
        {
            // return base_url() . 'assets/KAdmin-Light/' . $add;
            return base_url() . 'assets/KAdmin-Dark/' . $add;
        }
    }
?>