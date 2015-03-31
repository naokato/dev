<?php
/**
 * このクラスは勉強用です
 */
class MyClass {
    private $name;
    private $age;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->name = "naokato";
        $this->age = 27;
    }

    /**
     * 対象にhelloする
     *
     * @param  string
     * @return string
     */
    public function hello($name)
    {
        return "hello " . $name;
    }
    
    /**
     * 対象にbyeする
     *
     * @param  string
     * @return string
     */
    public function bye($name)
    {
        return "bye " . $name;
    }
}

// about class
$refrectorClass = new ReflectionClass('MyClass');
var_dump($refrectorClass->getDocComment());

// about method
print "===============================================\n";
$refrectorMethods = $refrectorClass->getMethods();
var_dump($refrectorMethods);
foreach($refrectorMethods as $method) {
    var_dump($method->getDocComment());
}

