<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author Dave Www <davewwwo@gmail.com>
 */
class DefaultOperatorComparator implements ComparatorsInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getComparators()
    {
        return array(
            '=='  => function ($a, $b) {
                return $a == $b;
            },
            '===' => function ($a, $b) {
                return $a === $b;
            },
            '!='  => function ($a, $b) {
                return $a != $b;
            },
            '!==' => function ($a, $b) {
                return $a !== $b;
            },
            '<'   => function ($a, $b) {
                return $a < $b;
            },
            '<='  => function ($a, $b) {
                return $a <= $b;
            },
            '>='  => function ($a, $b) {
                return $a >= $b;
            },
            '>'   => function ($a, $b) {
                return $a > $b;
            }
        );
    }
}
