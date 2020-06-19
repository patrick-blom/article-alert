<?php

namespace PaBlo\ArticleAlert\Tests\Unit\Adapter\Model;

use OxidEsales\TestingLibrary\UnitTestCase;
use PaBlo\ArticleAlert\Adapter\Model\SimpleArticle;

class SimpleArticleTest extends UnitTestCase
{

    /**
     * @var SimpleArticle
     */
    protected $SUT;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $articleMock;

    /**
     * Set SUT state before test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->articleMock = $this->getMockBuilder(\OxidEsales\Eshop\Application\Model\Article::class)
            ->disableOriginalConstructor()
            ->setMethods(['load', 'name', 'loaded', 'getFieldData'])
            ->getMock();

        $this->SUT = new SimpleArticle($this->articleMock);
    }

    /**
     * @covers \PaBlo\ArticleAlert\Adapter\Model\SimpleArticle::__construct
     */
    public function test_constructor_works_as_expected(): void
    {
        $model = new SimpleArticle((new \OxidEsales\Eshop\Application\Model\Article()));

        $delegate = $this->getProtectedClassProperty($model, 'article');
        $this->assertInstanceOf(\OxidEsales\Eshop\Application\Model\Article::class, $delegate);
    }

    /**
     * @covers \PaBlo\ArticleAlert\Adapter\Model\SimpleArticle::load
     */
    public function test_loading_the_model_will_return_a_boolean(): void
    {
        $this->articleMock->expects($this->at(0))
            ->method('load')
            ->with('foo')
            ->willReturn(true);

        $this->articleMock->expects($this->at(1))
            ->method('load')
            ->with('bar')
            ->willReturn(false);

        $this->assertTrue($this->SUT->load('foo'));
        $this->assertFalse($this->SUT->load('bar'));
    }
}
