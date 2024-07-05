<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UtilityHelper
{
    /**
     * Generate a new code based on the given prefix.
     *
     * @param string $prefix
     * @param string $table
     * @param string $column
     * @return string
     */
    public static function generate($prefix, $table, $column)
    {
        $lastRecord = DB::table($table)->orderBy($column, 'desc')->first();

        if (!$lastRecord) {
            return $prefix . '0001';
        }

        $lastIdNumber = (int)Str::after($lastRecord->$column, $prefix);
        $newIdNumber = $lastIdNumber + 1;
        return $prefix . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
    }
}
