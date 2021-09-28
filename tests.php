<?php

require './database.php';

use PHPUnit\Framework\TestCase;

class tests extends TestCase {
    //success test
    public function testDisplayDB(){
    $input = ["artist"=>"osaias",
        "year-made" => 2000,
        "painting-name" => "lmao",
        "image-link"=> "foo.bar"
    ] ;

    $expected = '<div>'. '<img src="images/' . $result['image-link'] . '" alt="a painting of  '
            . $result['painting-name'] .' " /><p>'
            . $result['artist'] . '<br>' . $result['painting-name'] . '<br>' . $result['year-made'] .  '</p></div>';

    $result = displayDB($input);
    $this->assertContains("year-made", $result);
    }
}
