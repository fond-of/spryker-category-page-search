<?php

namespace FondOfSpryker\Zed\CategoryPageSearch\Communication;

use FondOfSpryker\Zed\CategoryPageSearch\CategoryPageSearchDependencyProvider;
use Spryker\Zed\CategoryPageSearch\Communication\CategoryPageSearchCommunicationFactory as SprykerCategoryPageSearchCommunicationFactory;

class CategoryPageSearchCommunicationFactory extends SprykerCategoryPageSearchCommunicationFactory
{
    /**
     * @return array
     */
    public function getCategoryPageMapExpanderPlugins(): array
    {
        return $this->getProvidedDependency(CategoryPageSearchDependencyProvider::PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER);
    }
}
