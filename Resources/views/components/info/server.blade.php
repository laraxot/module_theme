Made with Laravel <b>{{ App()::VERSION }}</b>
php <b>{{ phpversion() }}</b>
Memory usage: <b>{{ $mem['usage_nice'] }}</b> / <b>{{ $mem['total_nice'] }}</b> <b>{{ $mem['perc'] }}%</b>
@php
/*
xdebug_set_filter(
<<<<<<< HEAD
    XDEBUG_FILTER_TRACING, XDEBUG_PATH_EXCLUDE,
    [ __DIR__ . "/vendor/" ]
);
xdebug_print_function_stack();
*/
@endphp
=======
    XDEBUG_FILTER_TRACING, XDEBUG_PATH_EXCLUDE, 
    [ __DIR__ . "/vendor/" ]
);    
xdebug_print_function_stack();
*/
@endphp 
>>>>>>> ede0df7 (first)
