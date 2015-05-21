<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author David Wolter <david@lovoo.com>
 */
class BoolComparator implements ComparatorsInterface
{
    /**
     * {@inheritdoc
     */
    public static function getComparators()
    {
        return array(
            'bool' => function ($a, $b) {
                return self::boolval($a) === self::boolval($b);
            }
        );
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    private static function boolval($value)
    {
        if (is_numeric($value)) {
            $value = (float) $value > 0;
        } elseif (is_string($value)) {
            $value = 'false' !== $value;
        }

        return is_bool($value) ? $value : false;
    }
}
