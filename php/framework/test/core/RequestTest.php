<?php
require dirname(__FILE__) . '/../../core/Request.php';

class RequestTest extends PHPUnit_Framework_TestCase
{
    private $target;

    public function setUp()
    {
        $this->target = new Request();
    }

    public function testIsPost_true()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->assertTrue($this->target->isPost());
    }
    
    public function testIsPost_false()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $this->assertFalse($this->target->isPost());
    }

    public function testGetGet()
    {
        $_GET = array(
            'name'  =>  'rex',
            'age'   =>  47,
        );

        $this->assertSame('rex', $this->target->getGet('name'));
        $this->assertSame(47, $this->target->getGet('age'));
        $this->assertSame(null, $this->target->getGet('not_exist'));
        $this->assertSame('', $this->target->getGet('not_exist', ''));
    }
    
    public function testGetPost()
    {
        $_POST = array(
            'name'  =>  'rex',
            'age'   =>  47,
        );

        $this->assertSame('rex', $this->target->getPost('name'));
        $this->assertSame(47, $this->target->getPost('age'));
        $this->assertSame(null, $this->target->getPost('not_exist'));
        $this->assertSame('', $this->target->getPost('not_exist', ''));
    }
    
    public function testGetHost_HTTP_HOST()
    {
        $_SERVER['HTTP_HOST'] = 'test.co.jp';
        $this->assertSame('test.co.jp', $this->target->getHost());
    }
    
    public function testGetHost_SERVER_NAME()
    {
        $_SERVER['HTTP_HOST'] = null;
        $_SERVER['SERVER_NAME'] = 'tester.co.jp';
        $this->assertSame('tester.co.jp', $this->target->getHost());
    }
    
    public function testIsSsl_on()
    {
        $_SERVER['HTTPS'] = 'on';
        $this->assertTrue($this->target->isSsl());
    }
    
    public function testIsSsl_off()
    {
        // off
        $_SERVER['HTTPS'] = 'off';
        $this->assertFalse($this->target->isSsl());
        
        // no set
        unset($_SERVER['HTTPS']);
        $this->assertFalse($this->target->isSsl());
    }

    public function testGetUri()
    {
        $_SERVER['REQUEST_URI'] = '/path/aaa/bbb';
        $this->assertSame('/path/aaa/bbb', $this->target->getUri());
    }
    
    /**
     *  @dataProvider urlDataProvider
     */
    public function testGetBaseUrl_GetPathInfo($requestUri, $scriptName, $baseUrl, $pathInfo)
    {
        $_SERVER['REQUEST_URI'] = $requestUri;
        $_SERVER['SCRIPT_NAME'] = $scriptName;

        $this->assertSame($baseUrl, $this->target->getBaseUrl());
        $this->assertSame($pathInfo, $this->target->getPathInfo());
    }

    public function urlDataProvider()
    {
        return array(
            array(
                '/foo/bar/list',
                '/foo/bar/index.php',
                '/foo/bar',
                '/list',
            ),
            array(
                'index.php/list?name=alex',
                'index.php',
                'index.php',
                '/list',
            ),
            array(
                '/',
                'index.php',
                '',
                '/',
            ),
        );
    }
}
