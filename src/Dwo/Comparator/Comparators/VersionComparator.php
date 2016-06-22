<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author Dave Www <davewwwo@gmail.com>
 */
class VersionComparator implements ComparatorsInterface
{
    /**
     * {@inheritdoc
     */
    public static function getComparators()
    {
        return array(
            'version' => function ($a, $b, $operator = null) {
                return version_compare($a, $b, $operator ?: '<=');
            }
        );
    }
}
