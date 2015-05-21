<?php

namespace Dwo\Comparator\Comparators;

/**
 * @author David Wolter <david@lovoo.com>
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
