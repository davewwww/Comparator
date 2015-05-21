[![Build Status](https://travis-ci.org/davewwww/Comparator.svg)](https://travis-ci.org/davewwww/Comparator) [![Coverage Status](https://coveralls.io/repos/davewwww/Comparator/badge.svg)](https://coveralls.io/r/davewwww/Comparator)

Comparator
----------
The Comparator is a little library to compare values in a easy way.
Very useful for dynamic comparisons.

```php
$operator = '==';
$argument1 = 1;
$argument2 = 1;
if(Comparator::compare($operator, $argument1, $argument2)) {
    //do something
}
```

Operators
----------
The Comparator comes with some operators:

- '==', '!=', '>', '>=', '<', '<='
- 'version'
- 'substr'
- 'bit'
- 'between'
- 'bool'
- 'day'
- 'date_range'

```php

//Example 'bool' operator
if(Comparator::compare('bool', true, $_GET['activated'])) {
    //do something
}

//Example 'date' operator
if(Comparator::compare('day', 'now', $date)) {
    //do something
}

//Example 'date_range' operator
if(Comparator::compare('date_range', new \DateTime(), $dateFrom, $dateTo)) {
    //do something
}
```

The 'date' and 'date_range' operators can handle Timestamps, DateTimeObjects as well as DateStrings ('now' or '-2 days').

Installation
------------
Installation with Composer
```yml
composer.phar require dwo/comparator
```