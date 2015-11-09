# Hashee

[![Build Status](https://travis-ci.org/serima/Hashee.svg)](https://travis-ci.org/serima/Hashee)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/serima/Hashee/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/serima/Hashee/?branch=master)

Very simple optimization using hash lookups to search an array.

## Installation

```
composer require serima/hashee
```

## Usage

```php
<?php

use Serima\Hashee\Hashee;

$hashForSearch = array();
Hashee::add($hashForSearch, 'super');
Hashee::add($hashForSearch, 'bad');
Hashee::add($hashForSearch, 'word');

Hashee::in('good', $hashForSearch); // false
Hashee::in('bad', $hashForSearch); // true
Hashee::release($hashForSearch);

$bannedUserNames = array('Jim', 'Taro', 'Fred');
Hashee::addBulk($bannedUserNames);
Hashee::delete($bannedUserNames, 'Fred');
Hashee::in('Jim', $bannedUserNames); // true
Hashee::in('Fred', $bannedUserNames); // false
Hashee::release($bannedUserNames);

```

## Benchmark

You can see the benchmark script in `tests/Benchmark.php`

```
% php tests/Benchmark.php
========================================
elementNumber : 5
in_array: 0.030714988708496
hashee:   0.013134956359863
========================================
========================================
elementNumber : 10
in_array: 0.032805919647217
hashee:   0.012555122375488
========================================
========================================
elementNumber : 100
in_array: 0.15763115882874
hashee:   0.010236978530884
========================================
========================================
elementNumber : 1000
in_array: 1.3289721012115
hashee:   0.010061025619507
========================================
========================================
elementNumber : 10000
in_array: 13.358424901962
hashee:   0.0097849369049072
========================================
```

## Thanks

Hashee is inspired by this entry written by [@mtdowling](https://github.com/mtdowling).

[Favor Hash Lookups Over Array Searches](http://mtdowling.com/blog/2014/03/17/hash-lookups-over-array-search/)

I coded benchmark script using example from it.

## References

http://stackoverflow.com/questions/2473989/list-of-big-o-for-php-functions

## LICENSE

MIT License.
