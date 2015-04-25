<?php

/**
 * OUTPUT
 * 
 * So essentially this is designed to demonstrate all the wonderful ways to output to a terminal
 * 
 * Configure the file based on the variables at the top, and run it to see what happens!
 */

// /////////////////////////////////////////////////////////////////////////////////////////////////
// Configuration
// Don't try to turn them all on at once, maybe just one at a time with all the different modes
// ///////////////////////////////////////////////////////////////////////////////////////////////////

// The main ouput mode, change this!
// Available modes are "echo" "print_r" "var_dump"
$mode = 'print_r';

// Change these values :
$systemInformation = false; // Handy stats about the system
$timestamp = false; // Information about today
$coolDesign = false; // Will display a cool design based on configuration
$coolDesignRatio = 73; // Change this to change the design
$array = false; // This one is tricky, it might not work with some output modes
$object = false; // Objects are a pretty advanced thing, but these also might give you some trouble

/*
 * Possible strings to output
 */

if ($systemInformation) {
    $ip = getHostByName(getHostName());
    $host = gethostname();
    $mem = memory_get_usage();
    $value = "SYSTEM INFORMATION : Ip = $ip Host = $host Memory = $mem kb";
    output($mode, $value);
}

if ($array) {
    $arr[] = 'This';
    $arr[] = 'is';
    $arr[] = 'a';
    $arr[] = 'great';
    $arr[] = 'array!';
    output($mode, $arr);
}

if ($object) {
    $obj = new stdClass();
    $obj->name = 'Charlie';
    $obj->type = 'Sheepdog';
    $obj->species = 'Dog';
    output($mode, $obj);
}

if ($timestamp) {
    date_default_timezone_set('MST');
    $value = 'TIMESTAMP : ' . date('Y-m-d H:i:s') . ' Unix Time (' . time() . ')';
    output($mode, $value);
}

if ($coolDesign) {
    $chars[] = '*';
    $chars[] = '.';
    $chars[] = '~';
    $chars[] = '-';
    $chars[] = ' ';
    $string = '';
    while ($coolDesignRatio > 0) {
        $string .= $chars[rand(0, 4)];
        $coolDesignRatio --;
    }
    $limit = 100; // You can change this too, it just controls how long to echo the patern for
    while ($limit > 0) {
        echo $string;
        $limit --;
    }
    echo PHP_EOL;
}

/**
 * Will output some information based on what the mode is set to
 *
 * @param string $mode            
 * @param string $value            
 */
function output($mode, $value)
{
    $mode = strtolower($mode);
    switch ($mode) {
        case 'echo':
            echo $value; // echo the value
            echo PHP_EOL; // Also return a new line
            break;
        case 'print_r':
            print_r($value); // print_r the value
            print_r(PHP_EOL); // Also return a new line
            break;
        case 'var_dump':
            var_dump($value); // var_dump the value
            break;
        default:
            // Something went wrong!
            echo 'Invalid mode ' . $mode . ' - please use "echo" or "print_r" or "var_dump"';
            die();
            break;
    }
}