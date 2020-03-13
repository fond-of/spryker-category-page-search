<?php

namespace FondOfSpryker\Zed\CategoryPageSearch\Communication\Plugin\Search;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CategoryPageSearch\Communication\CategoryPageSearchCommunicationFactory;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\StoreTransfer;
use ReflectionClass;
use Spryker\Zed\CategoryPageSearch\Dependency\Facade\CategoryPageSearchToStoreFacadeInterface;
use Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface;

class CategoryNodeDataPageMapBuilderTest extends Unit
{
    /**
     * @var \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $pageMapBuilderMock;

    /**
     * @var \FondOfSpryker\Zed\CategoryPageSearch\Communication\CategoryPageSearchCommunicationFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $factoryMock;

    /**
     * @var \Spryker\Zed\CategoryPageSearch\Dependency\Facade\CategoryPageSearchToStoreFacadeInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $categoryPageSearchToStoreFacadeMock;

    /**
     * @var \Generated\Shared\Transfer\LocaleTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $localeTransferMock;

    /**
     * @var \Generated\Shared\Transfer\StoreTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $storeTransferMock;

    /**
     * @var \FondOfSpryker\Zed\CategoryPageSearch\Communication\Plugin\Search\CategoryNodeDataPageMapBuilder
     */
    protected $categoryNodeDataPageMapBuilder;



    public function _before()
    {
        parent::_before();

        $this->pageMapBuilderMock = $this->getMockBuilder(PageMapBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->factoryMock = $this->getMockBuilder(CategoryPageSearchCommunicationFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->categoryPageSearchToStoreFacadeMock = $this->getMockBuilder(CategoryPageSearchToStoreFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->localeTransferMock = $this->getMockBuilder(LocaleTransfer::class)
            ->setMethods(['getLocaleName'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->storeTransferMock = $this->getMockBuilder(StoreTransfer::class)
            ->setMethods(['getName'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->categoryNodeDataPageMapBuilder = new CategoryNodeDataPageMapBuilder();
        $this->categoryNodeDataPageMapBuilder->setFactory($this->factoryMock);
    }

    /**
     * @return void
     */
    public function testBuildPageMapSuccess(): void
    {
        $this->localeTransferMock->expects($this->atLeastOnce())
            ->method('getLocaleName')
            ->willReturn('en_US');

        $this->factoryMock->expects($this->atLeastOnce())
            ->method('getStoreFacade')
            ->willReturn($this->categoryPageSearchToStoreFacadeMock);

        $this->categoryPageSearchToStoreFacadeMock->expects($this->atLeastOnce())
            ->method('getCurrentStore')
            ->willReturn($this->storeTransferMock);

        $this->storeTransferMock->expects($this->atLeastOnce())
            ->method('getName')
            ->willReturn('STORE');

        $this->categoryNodeDataPageMapBuilder->buildPageMap($this->pageMapBuilderMock, [], $this->localeTransferMock);
    }

    /**
     * @param string $name
     *
     * @throws
     *
     * @return \ReflectionMethod
     */
    protected function getMethod(string $name)
    {
        $class = new ReflectionClass(CategoryNodeDataPageMapBuilder::class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}
