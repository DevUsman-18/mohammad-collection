<?php

require 'functions.php';

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

    //failure test
    //right number of elements returned?
    public function testFailureDisplayDB(){
        $expected = 'Incorrect input received.';
        $input = [];
        $result = displayDB($input);
        $this->assertEquals($expected, $result);
    }



    //malformed test
    public function testMalformedDisplayDB(){
        $input = 87;
        $this->expectException(TypeError::class);
        displayDB($input);
    }
}
