<?php

use Carbon\Carbon;

if (!function_exists('tglIndo')) {
    /**
     * Format tanggal ke Bahasa Indonesia
     *
     * @param  string|\DateTimeInterface  $date
     * @param  string  $format
     * @return string
     */
    function tglIndo($date, $format = 'd F Y')
    {
        return Carbon::parse($date)->translatedFormat($format);
    }
}
