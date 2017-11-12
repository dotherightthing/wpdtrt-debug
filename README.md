# DTRT Helpers

Utilities for use in themes and plugins.

## Usage

### Composer.json

```
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:dotherightthing/wpdtrt-debug.git"
        }
    ],
    "require-dev": {
        "dotherightthing/wpdtrt-debug": "dev-master"
    },
```

### File.php

```
$debug = new DoTheRightThing\WPDebug\Debug;

function log_demo {
	global $debug;
	$debug->log('hello world');

	// first = true, context = 'log_demo'
	$debug->log('one', true, 'log_demo');
	$debug->log('two', false, 'log_demo');
	$debug->log('three', false, 'log_demo');
}

function stacktrace_demo {
	global $debug;
	$debug->stacktrace();
}

function backtrace_demo {
	global $debug;
	$debug->backtrace('backtrace_demo');
}
```