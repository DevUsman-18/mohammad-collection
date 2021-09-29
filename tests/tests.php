<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class tests extends TestCase {
    //success test
    public function testDisplayDB(){
    $input = [[
        "artist"=>"osaias",
        "year-made"=>"2000",
        "painting-name"=>"lmao",
        "image-link" => "foobar.jpeg"
    ]];

    $expected = ' <div><img src="images/foobar.jpeg" alt="a painting of lmao " />';
    $expected .= '<p>osaias<br>lmao<br>2000</p></div>';

    $result = displayDB($input);
    $this->assertEquals($expected, $result);
    }

    public function testCleanseData(){
        $input = ["f>u!<bar"];
        $expected = ["f&#62;u!&#60;bar"];
        $result= cleanseData($input);
        $this->assertEquals($expected, $result);
    }

    //failure test
    public function testFailureDisplayDB(){
        $expected = 'Incorrect input received.';
        $input = [];
        $result = displayDB($input);
        $this->assertEquals($expected, $result);
    }

    public function testFailureCleanseData(){

    }


    //malformed test
    public function testMalformedDisplayDB(){
        $input = 87;
        $this->expectException(TypeError::class);
        displayDB($input);
    }

    public function testMalformedCleanseData(){
        $input = 42;
        $this->expectException(TypeError::class);
        cleanseData($input);
    }
}
