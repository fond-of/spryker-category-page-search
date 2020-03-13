<?php

namespace FondOfSpryker\Zed\CategoryPageSearch;

use Spryker\Zed\CategoryPageSearch\CategoryPageSearchDependencyProvider as SprykerCategoryPageSearchDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CategoryPageSearchDependencyProvider extends SprykerCategoryPageSearchDependencyProvider
{
    public const PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER = 'PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addCategoryPageMapExpanderPlugins($container);

        return $container;
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
     * @return \FondOfSpryker\Zed\CategoryPageSearch\Dependency\Plugin\CategoryPageMapExpanderInterface[]
     */
    protected function getCategoryPageMapExpanderPlugins(): array
    {
        return [];
    }
}
