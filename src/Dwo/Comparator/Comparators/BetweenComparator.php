<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author Dave Www <davewwwo@gmail.com>
 */
class BetweenComparator implements ComparatorsInterface
{
    /**
     * {@inheritdoc
     */
    public static function getComparators()
    {
        return array(
            'between' => function ($a, $min, $max) {
                return $min <= $a && $max >= $a;
            }
        );
    }
}
