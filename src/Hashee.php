<?php namespace Serima\Hashee;

class Hashee
{
    /**
     * @param $array
     * @param $value
     */
    public static function add(&$array, $value)
    {
        $array[$value] = true;
    }

    /**
     * @param $array
     * @param $value
     */
    public static function delete(&$array, $value)
    {
        unset($array[$value]);
    }

    /**
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function in($haystack, $needle)
    {
        return isset($haystack[$needle]);
    }
}