---
hostname: github.com
href: https://github.com/bestiejs/benchmark.js
title: bestiejs/benchmark.js: A benchmarking library. As used on jsPerf.com.
---

# bestiejs/benchmark.js

_A benchmarking library. As used on jsPerf.com. https://benchmarkjs.com\_

JavaScript 88.2% - HTML 7.3% - CSS 4.4% - Shell 0.1% -

1,162 commits
11 branches
24 releases
17 contributors


 Watch 96
 Star 3,340
 Fork 256


Issues 12

[](#benchmarkjs-v214)Benchmark.js v2.1.4
========================================

A [robust](https://mathiasbynens.be/notes/javascript-benchmarking "Bulletproof JavaScript benchmarks") benchmarking library that supports high-resolution timers & returns statistically significant results. As seen on [jsPerf](https://jsperf.com/).

[](#documentation)Documentation
-------------------------------

*   [API Documentation](https://benchmarkjs.com/docs)

[](#download)Download
---------------------

*   [Development source](https://raw.githubusercontent.com/bestiejs/benchmark.js/2.1.4/benchmark.js)

[](#installation)Installation
-----------------------------

Benchmark.js’ only hard dependency is [lodash](https://lodash.com/). Include [platform.js](https://mths.be/platform) to populate [Benchmark.platform](https://benchmarkjs.com/docs#platform).

In a browser:

<script src="lodash.js"></script>
<script src="platform.js"></script>
<script src="benchmark.js"></script>

In an AMD loader:

require({
  'paths': {
    'benchmark': 'path/to/benchmark',
    'lodash': 'path/to/lodash',
    'platform': 'path/to/platform'
  }
},
\['benchmark'\], function(Benchmark) {/*…*/});

Using npm:

$ npm i --save benchmark

In Node.js:

var Benchmark = require('benchmark');

Optionally, use the [microtime module](https://github.com/wadey/node-microtime) by Wade Simmons:

npm i --save microtime

Usage example:

var suite = new Benchmark.Suite;

// add tests
suite.add('RegExp#test', function() {
 /o/.test('Hello World!');
})
.add('String#indexOf', function() {
  'Hello World!'.indexOf('o') > -1;
})
// add listeners
.on('cycle', function(event) {
  console.log(String(event.target));
})
.on('complete', function() {
  console.log('Fastest is ' + this.filter('fastest').map('name'));
})
// run async
.run({ 'async': true });

// logs:
// =\> RegExp#test x 4,161,532 +-0.99% (59 cycles)
// =\> String#indexOf x 6,139,623 +-1.00% (131 cycles)
// =\> Fastest is String#indexOf

[](#support)Support
-------------------

Tested in Chrome 54-55, Firefox 49-50, IE 11, Edge 14, Safari 9-10, Node.js 6-7, & PhantomJS 2.1.1.

[](#bestiejs)BestieJS
---------------------

Benchmark.js is part of the BestieJS _“Best in Class”_ module collection. This means we promote solid browser/environment support, ES5+ precedents, unit testing, & plenty of documentation.
