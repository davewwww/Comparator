<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author David Wolter <david@lovoo.com>
 */
interface ComparatorsInterface
{
    /**
     * @return \Closure[]
     */
    public static function getComparators();
}
