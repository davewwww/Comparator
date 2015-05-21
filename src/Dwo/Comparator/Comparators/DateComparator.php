<?php

namespace Dwo\Comparator\Comparators;

use DateTime;

/**
 * @author David Wolter <david@lovoo.com>
 */
class DateComparator implements ComparatorsInterface
{

    /**
     * {@inheritdoc
     */
    public static function getComparators()
    {
        return array(
            'date_range' => function ($from = null, $to = null, $now = null) {
                $from = self::makeDate($from);
                $to = self::makeDate($to);
                $now = self::makeDate($now ?: 'now');

                if (self::isDate($from) && self::isDate($to)) {
                    return $from <= $now && $to >= $now;
                }

                if (self::isDate($from)) {
                    return $from <= $now;
                }

                if (self::isDate($to)) {
                    return $to >= $now;
                }

                return false;
            },
            'day'        => function ($a, $b) {
                if (self::isDate($a = self::makeDate($a))) {
                    $a = $a->format('Y-m-d');
                }
                if (self::isDate($b = self::makeDate($b))) {
                    $b = $b->format('Y-m-d');
                }

                return $a === $b;
            }
        );
    }

    /**
     * @param mixed $date
     *
     * @return bool
     */
    protected static function isDate($date = null)
    {
        return $date instanceof DateTime;
    }

    /**
     * @param mixed $date
     *
     * @return DateTime|null
     */
    protected static function makeDate($date = null)
    {
        if (is_string($date)) {
            $date = new DateTime($date);
        } elseif (is_numeric($date)) {
            $date = new DateTime('@'.$date);
        }

        return self::isDate($date) ? $date : null;
    }
}
