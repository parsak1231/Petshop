<?php

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

if (!function_exists('getEntriesData')) {
    function getEntriesData(Request $request, array $entriesList, int $default)
    {
        $entries = $request->get('entries', $default);
        return in_array($entries, $entriesList) ? $entries : $default;
    }
}

if (!function_exists('getAllowedRoles')) {
    function getAllowedRoles(): array
    {
        $allowedNames = ['admin', 'super_admin'];
        return Role::whereIn('name', $allowedNames)->pluck('id')->toArray();
    }
}
