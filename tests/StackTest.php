<?php
namespace alexrvs\slackbotlistener\tests;

use PHPUnit\Framework\TestCase;

/**
 * Class StackTest
 * @package alexrvs\slackbotlistener\tests
 */
class StackTest extends TestCase{

    /**
     * @return array
     */
    public function testEmpty(){
        $stack = [];
        $this->assertEmpty($stack);
        return $stack;
    }

    /**
     * @param array $stack
     * @return array
     * @depends testEmpty
     */
    public function testPush(array $stack){
        array_push($stack,'foo');
        $this->assertEquals('foo',$stack[count($stack)-1]);
        $this->assertNotEmpty($stack);
        return $stack;
    }

    /**
     * @param array $stack
     * @return array
     * @depends testEmpty
     */
    public function testPop(array $stack){
        array_pop($stack);
        $this->assertEmpty($stack);
        return $stack;
    }
}