<?php

namespace FondOfSpryker\Zed\CategoryPageSearch\Communication;

use Spryker\Zed\CategoryPageSearch\Communication\CategoryPageSearchCommunicationFactory as SprykerCategoryPageSearchCommunicationFactory;

class CategoryPageSearchCommunicationFactory extends SprykerCategoryPageSearchCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Zed\CategoryPageSearch\Dependency\Plugin\CategoryPageMapExpanderInterface[];
     */
    public function getCategoryPageMapExpanderPlugins(): array
    {
        return [];
    }
}
