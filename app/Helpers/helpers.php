<?php

use Illuminate\Http\Request;

if (!function_exists('getEntriesData'))
{
    function getEntriesData(Request $request, array $entriesList, int $default)
    {
        $entries = $request->get('entries', $default);
        return in_array($entries, $entriesList) ? $entries : $default;
    }
}
