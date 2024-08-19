<?php

use Illuminate\Support\Carbon;

if (!function_exists('formatDate')) {
    function formatDate(string $date,string $format = 'd/m/Y'): string
    {
        if ($date =='' ){
            return '';
        }
        return  Carbon::createFromFormat($format, $date)->format(config('app.date_format'));
    }
}

if (!function_exists('insertFormatDate')) {
    function insertFormatDate(string $date,string $format = 'd/m/Y'): string
    {
        if ($date =='' ){
            return '';
        }
        return  Carbon::createFromFormat($format, $date)->format('Y-m-d');
    }
}

if (!function_exists('formatTime')) {
    function formatTime(string $time,string $format = 'H:i:s'): string
    {
        if ($time == '' ){
            return '';
        }
        return  Carbon::createFromFormat($format, $time)->format(config('app.time_format'));
    }
}

if (!function_exists('formatDateTime')) {
    function formatDateTime(string $time,string $format = 'Y-m-d H:i:s'): string
    {
        if ($time == '' ){
            return '';
        }
        return  Carbon::createFromFormat($format, $time)->format(config('app.time_format'));
    }
}

if (!function_exists('insertTimeFormat')) {
    function insertTimeFormat(string $time): string
    {
        if ($time == '' ){
            return '';
        }
        return  Carbon::parse( $time)->format('H:i:s');
    }
}
