<?php

namespace Dwo\Comparator\Tests;

use Dwo\Comparator\Comparator;

/**
 * @author David Wolter <david@lovoo.com>
 */
class ComparatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function test()
    {
        $args = func_get_args();
        $result = array_shift($args);

        $error = sprintf('%s', json_encode($args));
        self::assertEquals($result, call_user_func_array(['Dwo\Comparator\Comparator', 'compare'], $args), $error);
    }

    public function provider()
    {
        return array(
            //Default
            array(true, 'default', 1, 1),
            array(true, 'default', 1, '1'),
            array(true, 'default', 1, [1]),
            array(true, 'default', 1, [3, 2, 1]),
            //DefaultOperator
            array(true, '==', 1, 1),
            array(true, '===', 1, 1),
            array(false, '===', 1, '1'),
            array(false, '==', 1, 2),
            array(true, '!=', 1, 2),
            array(true, '!==', 1, 2),
            array(true, '<', 1, 2),
            array(true, '>', 2, 1),
            array(true, '>=', 2, 2),
            array(true, '<=', 2, 2),
            //Version
            array(true, 'version', 1.2, 1.3),
            array(false, 'version', 1.5, 1.3),
            array(true, 'version', 1.5, 1.3, '>'),
            //String
            array(true, 'substr', 'foo', 'foobar'),
            array(false, 'substr', 'foobar', 'foo'),
            //Bit
            array(true, 'bit', 1, 3),
            array(false, 'bit', 1, 2),
            //Between
            array(true, 'between', 5, 1, 10),
            //Bool
            array(true, 'bool', 'true', true),
            array(true, 'bool', true, 'true'),
            array(true, 'bool', 'true', 'true'),
            array(true, 'bool', 'true', 'truu'),
            array(true, 'bool', 'true', '1'),
            array(true, 'bool', 'true', '0.1'),
            array(true, 'bool', 'true', 1),
            array(true, 'bool', 'true', 1.1),
            array(false, 'bool', 'true', 'false'),
            array(true, 'bool', 'false', false),
            array(true, 'bool', 'false', 'false'),
            array(true, 'bool', 'false', '0'),
            array(true, 'bool', 'false', '0.0'),
            array(true, 'bool', 'false', 0),
            array(true, 'bool', 'false', 0.0),
            array(true, 'bool', 'false', -1),
            array(false, 'bool', 'false', 'nonono'),
            //Day
            array(true, 'day', '2015-01-01', '2015-01-01 15:28:08'),
            array(true, 'day', '01.01.2015', '2015-01-01 15:28:08'),
            array(true, 'day', '2015-01-01 07:44:12', '2015-01-01 15:28:08'),
            array(true, 'day', '2015-01-01 07:44:12', new \DateTime('2015-01-01 15:28:08')),
            array(true, 'day', '2015-01-01', new \DateTime('2015-01-01 15:28:08')),
            array(true, 'day', '01.01.2015', new \DateTime('2015-01-01 15:28:08')),
            array(true, 'day', new \DateTime('2015-01-01 07:44:12'), '2015-01-01 15:28:08'),
            array(true, 'day', new \DateTime('2015-01-01 07:44:12'), new \DateTime('2015-01-01 15:28:08')),
            array(false, 'day', '2015-01-01', '2015-01-02'),
            array(false, 'day', new \DateTime('now'), new \DateTime('-1 day')),
            array(true, 'day', time(), 'now'),
            //DateRange
            array(true, 'date_range', 'now', '-1day', '+1day'),
            array(true, 'date_range', '-2day', '-3day', '-1day'),
            array(true, 'date_range', time(), time() - 10, time() + 10),
            array(true, 'date_range', 'now', new \DateTime('-1day'), '+1day'),
            array(true, 'date_range', 'now', new \DateTime('-1day'), new \DateTime('+1day')),
            array(true, 'date_range', 'now', '-1day', new \DateTime('+1day')),
            array(true, 'date_range', new \DateTime('now'), '-1day', new \DateTime('+1day')),
            array(true, 'date_range', new \DateTime('now'), new \DateTime('-1day'), new \DateTime('+1day')),
        );
    }
}