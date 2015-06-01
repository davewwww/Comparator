<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author Dave Www <davewwwo@gmail.com>
 */
class StringComparator implements ComparatorsInterface
{
    /**
     * {@inheritdoc
     */
    public static function getComparators()
    {
        return array(
            'substr' => function ($a, $b) {
                return false !== strpos($b, $a);
            }
        );
    }
}
