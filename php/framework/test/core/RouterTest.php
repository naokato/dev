<?php
require dirname(__FILE__) . '/../../core/Router.php';

class RouterTest extends PHPUnit_Framework_TestCase
{
    public function testCompileRoutes()
    {
        $definition = array(
            '/:controller/:action/:item' =>  array(
                'key'  =>  'value',
            ),
        );
        $expected = array(
            '/(?P<controller>[^/]+)/(?P<action>[^/]+)/(?P<item>[^/]+)' =>  array(
                'key'  =>  'value',
            ),
        );
        
        // set empty array to ignore __construct
        $target = new Router(array());
        $this->assertSame($expected, $target->compileRoutes($definition));
    }

    public function testResolve()
    {
        $definition = array(
            '/:controller/:action/:item' =>  array(
                'key'  =>  'value',
            ),
        );
        $expected = array(
            'key'           =>  'value',
            0               =>  '/user/info/payment',
            'controller'    =>  'user',
            1               =>  'user',
            'action'        =>  'info',
            2               =>  'info',
            'item'          =>  'payment',
            3               =>  'payment',
        );
        $target = new Router($definition);
        $this->assertSame($expected, $target->resolve('user/info/payment'));
        $this->assertFalse($target->resolve(''));
    }

}
