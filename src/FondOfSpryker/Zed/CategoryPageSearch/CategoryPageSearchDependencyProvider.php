<?php

namespace FondOfSpryker\Zed\CategoryPageSearch;

use FondOfSpryker\Zed\CategoryPageSearch\Dependency\Facade\CategoryPageSearchToSearchBridge;
use Spryker\Zed\CategoryPageSearch\CategoryPageSearchDependencyProvider as SprykerCategoryPageSearchDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CategoryPageSearchDependencyProvider extends SprykerCategoryPageSearchDependencyProvider
{
    public const PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER = 'PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER';
    public const FACADE_SEARCH = 'FACADE_SEARCH';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_SEARCH] = function (Container $container) {
            return new CategoryPageSearchToSearchBridge($container->getLocator()->search()->facade());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        parent::provideCommunicationLayerDependencies($container);
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCategoryPageMapExpanderPlugins(Container $container): Container
    {

        $container[self::PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER] = function (Container $container) {
            return $this->getCategoryPageMapExpanderPlugins();
        };

        return $container;
    }

    /**
     * @return array
     */
    protected function getCategoryPageMapExpanderPlugins(): array
    {
        return [];
    }
}
