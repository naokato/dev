<?php
require dirname(__FILE__) . '/../../core/ClassLoader.php';

class ClassLoaderTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        // register class loader
        $loader = new ClassLoader();
        $loader->registerDir(dirname(__FILE__).'/classLoaderTestData');
        $loader->register();

        // try class load
        $obj = new TestDataClass;
        $this->assertSame("testOK", $obj->execute());
    }
}
