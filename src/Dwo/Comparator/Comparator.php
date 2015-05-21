<?php

namespace Dwo\Comparator;

/**
 * @author David Wolter <david@lovoo.com>
 */
class Comparator
{
    /**
     * @var \Closure[]
     */
    private static $operators;

    /**
     * @var array
     */
    private static $operatorsMap = array(
        '\Dwo\Comparator\Comparators\DefaultComparator',
        '\Dwo\Comparator\Comparators\DefaultOperatorComparator',
        '\Dwo\Comparator\Comparators\VersionComparator',
        '\Dwo\Comparator\Comparators\StringComparator',
        '\Dwo\Comparator\Comparators\BitComparator',
        '\Dwo\Comparator\Comparators\BetweenComparator',
        '\Dwo\Comparator\Comparators\BoolComparator',
        '\Dwo\Comparator\Comparators\DateComparator',
    );

    /**
     * @param string $operator
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public static function compare()
    {
        $args = func_get_args();

        $operator = array_shift($args);

        return call_user_func_array(self::getComparator($operator), $args);
    }

    /**
     * @param string $operator
     *
     * @return \Closure
     *
     * @throws \Exception
     */
    public static function getComparator($operator)
    {
        if (!isset(self::$operators[$operator])) {
            if (count(self::$operatorsMap)) {
                self::initMap();
            }

            if (!isset(self::$operators[$operator])) {
                throw new \Exception(sprintf('"%s" operator not found', $operator));
            }
        }

        return self::$operators[$operator];
    }

    /**
     *
     */
    public static function initMap()
    {
        foreach (self::$operatorsMap as $class) {
            foreach (call_user_func(array($class, 'getComparators')) as $operator => $closure) {
                self::$operators[$operator] = $closure;
            }
        }
        self::$operatorsMap = null;
    }

    /**
     * @param string   $operator
     * @param callable $closure
     */
    public static function addComparator($operator, \Closure $closure)
    {
        static::$operators[$operator] = $closure;
    }
}
