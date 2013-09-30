--TEST--
Check for vcl.use
--SKIPIF--
<?php if (!extension_loaded("varnish") || !file_exists(dirname(__FILE__) . '/config.php')) print "skip"; ?>
<?php if (!getenv("VARNISH_TEST_SECRET")) print "skip VARNISH_TEST_SECRET not set"; ?>
--FILE--
<?php 

include dirname(__FILE__) . '/config.php';

$r = true;

$va = new VarnishAdmin($args_ident);
$va->connect();
$va->auth();

$list = $va->getVclList();
$name = $list[0]['name']; // thats enough to get the first best name

$r = $va->vclUse($name);
var_export($r);
echo "\n";

?>
--EXPECT--
true
