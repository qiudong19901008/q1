<?php
namespace q1\config;

if ( ! defined( 'ABSPATH' ) ) { die; }



const TOKEN_SALT = 'SDFSdfjskdg';

// 60*60*24*7 
const TOKEN_EXPIRE_SECONDS = 60*60*24*7;

include('./pageDefaultConfig.php');

