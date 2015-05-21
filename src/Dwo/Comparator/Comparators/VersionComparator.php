<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author David Wolter <david@lovoo.com>
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
                return version_compare($a, $b, $operator);
            }
        );
    }
}
