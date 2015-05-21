<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author David Wolter <david@lovoo.com>
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
