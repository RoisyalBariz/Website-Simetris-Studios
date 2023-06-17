<?php

if (!function_exists('moneyFormat')) {
    /**
     * moneyFormat
     *
     * @param  mixed $str
     * @return void
     */
    function moneyFormat($str)
    {
        $hasil =  number_format($str, 0, ',', '.');
        return $hasil;
    }
}
