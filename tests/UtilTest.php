<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Post;

class UtilTest extends TestCase
{
    public function testSomething()
    {
    	$post = new Post();

    	$post->setContent('un deux trois quatre cinq six');
        $this->assertEquals(6, $post->countWords());
        $post->setContent('un  ');
        $this->assertEquals(1, $post->countWords());

    }
}
