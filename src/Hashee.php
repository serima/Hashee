<?php namespace Serima\Hashee;

class Hashee
{
    /**
     * Add a value as hash
     *
     * @param array $array
     * @param $value
     * @return void
     */
    public static function add(array &$array, $value)
    {
        $array[$value] = true;
    }

    /**
     * Add values in bulk as hash
     *
     * @param array $values
     * @return void
     */
    public static function addBulk(array &$values)
    {
        $values = array_fill_keys($values, true);
    }


    /**
     * Unset the specified value from a hash
     *
     * @param $array
     * @param $value
     * @return void
     */
    public static function delete(array &$array, $value)
    {
        unset($array[$value]);
    }

    /**
     * Unset the specified values in bulk from a hash
     *
     * @param array $array
     * @param array $values
     * @return void
     */
    public static function deleteBulk(array &$array, array $values)
    {
        foreach ($values as $value) {
            if (isset($array[$value])) {
                unset($array[$value]);
            }
        }
    }

    /**
     * Checks if a value exists in a hash
     *
     * @param string $needle
     * @param array $haystack
     * @return bool
     */
    public static function in($needle, array $haystack)
    {
        return isset($haystack[$needle]);
    }

    /**
     * Unset a hash
     *
     * @param array $array
     * @return void
     */
    public static function release(array &$array)
    {
        $keys = array_keys($array);
        foreach ($keys as $k) {
            unset($array[$k]);
        }
    }
}