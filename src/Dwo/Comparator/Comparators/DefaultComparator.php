<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author Dave Www <davewwwo@gmail.com>
 */
class DefaultComparator implements ComparatorsInterface
{
    /**
     * {@inheritdoc
     */
    public static function getComparators()
    {
        return array(
            'default' => function ($a, $b) {
                return is_array($b) ? in_array($a, $b, true) : $a == $b;
            }
        );
    }
}
