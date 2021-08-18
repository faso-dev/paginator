<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Paginator;

use function abs;
use function ceil;
use function max;
use function min;

/**
 * Class Paginator
 * @package ChocoCode\Paginator\Paginator
 */
class Paginator implements PaginatorInterface
{
    private array $rangePages;
    private int $pageCount;
    /** @var int|float  */
    private $startPage;
    /** @var int|float  */
    private $endPage;
    private int $currentPage;
    private int $pageRange;
    private PaginationOptionInterface $paginationOptions;
    private int $totalItems;
    private int $itemsPerPage;

    /**
     * Paginator constructor.
     * @param int $totalItems
     * @param int $itemsPerPage
     */
    public function __construct(int $totalItems, int $itemsPerPage)
    {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->initPaginationOptions();
    }

    /**
     * Next page
     * @return int|null
     */
    public function getNextPage(): ?int
    {
        return $this->hasNextPage() ? $this->currentPage + 1 : null;
    }

    /**
     * @return int|null
     */
    public function getPreviousPage(): ?int
    {
        return $this->hasPreviousPage() ? $this->currentPage - 1 : null;
    }

    /**
     * @inheritDoc
     */
    public function hasNextPage(): bool
    {
        return $this->currentPage < $this->pageCount;
    }

    /**
     * @inheritDoc
     */
    public function hasPreviousPage(): bool
    {
        return $this->currentPage > 1;
    }

    public function getLastPage(): int
    {
        return $this->pageCount;
    }

    /**
     * @return int
     */
    public function getFirstPage(): int
    {
        return 1;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getFirstPageInRange(): int
    {
        return (int)min($this->rangePages);
    }

    /**
     * @return int
     */
    public function getLastPageInRange(): int
    {
        return (int)max($this->rangePages);
    }

    /**
     * @return int
     */
    public function getEndPage(): int
    {
        return $this->endPage;
    }

    /**
     * @return float|int
     */
    public function getStarPage()
    {
        return $this->startPage;
    }

    /**
     * @return int
     */
    public function getPageRange(): int
    {
        return $this->pageRange;
    }

    /**
     * @param int $pageRange
     * @return Paginator
     */
    public function setPageRange(int $pageRange): self
    {
        $this->pageRange = abs($pageRange);
        return $this;
    }

    /**
     *  Page count for current display
     * @return int
     */
    public function getPageCount(): int
    {
        return $this->pageCount = (int)ceil($this->totalItems / $this->itemsPerPage);
    }

    /**
     * Display items per page
     * @return int
     */
    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    /**
     * @return int
     */
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    /**
     * @param int $totalItems
     * @return Paginator
     */
    public function setTotalItems(int $totalItems): self
    {
        $this->totalItems = $totalItems;
        return $this;
    }

    /**
     * The range pages
     * @return array
     */
    public function getRangePages(): array
    {
        return $this->rangePages;
    }

    /**
     * @param int|float $startPage
     * @return $this
     */
    public function setStartPage($startPage): self
    {
        $this->startPage = (int)$startPage;
        return $this;
    }

    /**
     * @param int|float $endPage
     * @return $this
     */
    public function setEndPage($endPage): self
    {
        $this->endPage = (int)$endPage;
        return $this;
    }

    /**
     * @param array $rangePages
     * @return $this
     */
    public function setRangePages(array $rangePages): self
    {
        $this->rangePages = $rangePages;
        return $this;
    }

    /**
     * @param int $currentPage
     * @return $this
     */
    public function setCurrentPage(int $currentPage): self
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @param int $pageCount
     * @return $this
     */
    public function setPageCount(int $pageCount): self
    {
        $this->pageCount = $pageCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartPage(): int
    {
        return $this->startPage;
    }

    /**
     * @return array
     */
    public function getPaginationData(): array
    {
        $paginationData = [
            'lastPage' => $this->getLastPage(),
            'currentPage' => $this->getCurrentPage(),
            'itemsPerPage' => $this->getItemsPerPage(),
            'firstPage' => $this->getFirstPage(),
            'pageCount' => $this->getPageCount(),
            'totalCount' => $this->getTotalItems(),
            'pageRange' => $this->getPageRange(),
            'startPage' => $this->getStarPage(),
            'endPage' => $this->getEndPage(),
            'rangePages' => $this->getRangePages(),
            'firstPageInRange' => $this->getFirstPageInRange(),
            'lastPageInRange' => $this->getLastPageInRange(),
            'nextPage' => $this->getNextPage(),
            'previousPage' => $this->getPreviousPage(),
            'nextPageLabel' => $this->getNextPageLabel(),
            'previousPageLabel' => $this->getPreviousPageLabel(),
            'pageNameParameter' => $this->getPageParameterName()
        ];
        if ($this->hasPreviousPage()) {
            $paginationData['previousPage'] = $this->getPreviousPage();
        }
        if ($this->hasNextPage()) {
            $paginationData['nextPage'] = $this->getNextPage();
        }
        return $paginationData;
    }

    /**
     * @param string $previousPageLabel
     * @return $this
     */
    public function setPreviousPageLabel(string $previousPageLabel): self
    {
        $this->paginationOptions->setPreviousPageLabel($previousPageLabel);
        return $this;
    }

    /**
     * @param string $nextPageLabel
     * @return $this
     */
    public function setNextPageLabel(string $nextPageLabel): self
    {
        $this->paginationOptions->setNextPageLabel($nextPageLabel);
        return $this;
    }

    /**
     * @return string
     */
    public function getNextPageLabel(): string
    {
        return $this->paginationOptions->getNextPageLabel();
    }

    /**
     * @return string
     */
    public function getPreviousPageLabel(): string
    {
        return $this->paginationOptions->getPreviousPageLabel();
    }

    /**
     * @param PaginationOption $options
     * @return $this
     */
    public function setPaginationOptions(PaginationOptionInterface $options): self
    {
        $this->paginationOptions = $options;
        return $this;
    }

    /**
     * @return PaginationOption
     */
    public function getPaginationOptions(): PaginationOptionInterface
    {
        return $this->paginationOptions;
    }

    /**
     * @return string
     */
    public function getPageParameterName(): string
    {
        return $this->paginationOptions->getPageNameParameter();
    }

    /**
     * @param string $pageNameParameter
     * @return Paginator
     */
    public function setPageParameterName(string $pageNameParameter): self
    {
        $this->paginationOptions->setPageNameParameter($pageNameParameter);
        return $this;
    }

    private function initPaginationOptions(): void
    {
        if (null !== $this->paginationOptions){
            $this->paginationOptions = new PaginationOption;
        }
    }

}
