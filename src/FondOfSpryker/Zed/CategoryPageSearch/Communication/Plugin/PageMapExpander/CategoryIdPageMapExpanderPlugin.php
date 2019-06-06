<?php

namespace FondOfSpryker\Zed\CategoryPageSearch\Communication\Plugin\PageMapExpander;

use FondOfSpryker\Zed\CategoryPageSearch\Dependency\Plugin\CategoryPageMapExpanderInterface;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\CategoryPageSearch\Communication\CategoryPageSearchCommunicationFactory getFactory()
 */
class CategoryIdPageMapExpanderPlugin extends AbstractPlugin implements CategoryPageMapExpanderInterface
{
    public const ID_CATEGORY = 'id_category';

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $cateoryData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandCategoryPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $cateoryData, LocaleTransfer $localeTransfer): PageMapTransfer
    {
        if (isset($cateoryData[self::ID_CATEGORY])) {
            $pageMapTransfer->setCategoryId($cateoryData[self::ID_CATEGORY]);
        }

        return $pageMapTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $cateoryData
     *
     * @return void
     */
    protected function setFullTextSearch(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $cateoryData): void
    {
        $pageMapBuilder->addFullText($pageMapTransfer, $cateoryData[self::ID_CATEGORY]);
    }
}
