<?php
require_once 'src/CutyCaptRunner.php';

class CutyCaptRunnerTest extends PHPUnit_Framework_TestCase
{

    function setup()
    {
        if( ! getenv('CUTY_BIN') ) {
            $this->markTestIncomplete("Please export CUTY_BIN env variable.");
        }
    }

    function test()
    {
        $bin = getenv('CUTY_BIN');
        $runner = new CutyCaptRunner($bin);
        $runner->capture( 'http://google.com' , 'google.png' );
        $this->assertFileExists('google.png');
        unlink('google.png');
    }
}

