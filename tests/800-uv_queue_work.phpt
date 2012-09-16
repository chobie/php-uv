--TEST--
Check for uv_queue_work
--FILE--
<?php
$loop = uv_default_loop();
$buffer = "";

$a = function() use (&$buffer){
    $buffer .= "[queue]";
};

$b = function() use (&$buffer){
    $buffer .= "[finished]";
    echo $buffer;
};

$queue = uv_queue_work($loop, $a, $b);
uv_run();
--EXPECT--
[queue][finished]