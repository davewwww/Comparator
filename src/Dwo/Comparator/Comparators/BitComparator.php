<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author Dave Www <davewwwo@gmail.com>
 */
class BitComparator implements ComparatorsInterface
{
    /**
     * {@inheritdoc
     */
    public static function getComparators()
    {
        return array(
            'bit' => function ($a, $b) {
                return 0 !== ((int) $a & (int) $b);
            }
        );
    }
}
