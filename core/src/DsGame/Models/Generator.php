<?php

namespace DsGame\Models;

use Hash;

class Generator
{
    public static function generateToken($column, $length = 6, $strtoupper = true)
    {
        while (true) {
            $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

            if ($strtoupper) {
                $token = strtoupper($token);
            } else {
                $token = strtolower($token);
            }

            if (!User::where($column, '=', $token)->first()) {
                break;
            }
        }
        return $token;
    }

    public static function hashPassword($password)
    {
        return Hash::make($password);
    }
}

