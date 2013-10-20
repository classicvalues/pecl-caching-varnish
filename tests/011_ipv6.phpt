--TEST--
Check for varnish connection close
--SKIPIF--
<?php if (!extension_loaded("varnish") || !file_exists(dirname(__FILE__) . '/config.php')) print "skip"; ?>
<?php if (!getenv("VARNISH_TEST_IPV6")) print "skip VARNISH_TEST_IPV6 not set"; ?>
--FILE--
<?php 

include dirname(__FILE__) . '/config.php';

$r = true;

$va = new VarnishAdmin($args_ipv6);
var_export($va->disconnect());
echo "\n";
$va->connect();
var_export($va->disconnect());
echo "\n";

?>
--EXPECT--
false
true
