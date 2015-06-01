<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author Dave Www <davewwwo@gmail.com>
 */
interface ComparatorsInterface
{
    /**
     * @return \Closure[]
     */
    public static function getComparators();
}
