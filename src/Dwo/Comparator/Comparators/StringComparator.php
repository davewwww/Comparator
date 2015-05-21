<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author David Wolter <david@lovoo.com>
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
