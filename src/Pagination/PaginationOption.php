<?php declare(strict_types=1);

namespace ChocoCode\Paginator\Pagination;

class PaginationOption implements PaginationOptionInterface
{
    /**
     * Query parameter to retrieve current page
     * @var string
     */
    private string $pageNameParameter;
    /**
     * @var string
     */
    private string $nextPageLabel;
    /**
     * @var string
     */
    private string $previousPageLabel;

    /**
     * @param string|null $nextPageLabel
     * @param string|null $previousPageLabel
     * @param string|null $pageNameParameter
     */
    public function __construct(?string $nextPageLabel = 'Next', ?string $previousPageLabel = 'Previous', ?string $pageNameParameter = 'page')
    {
        $this->pageNameParameter = $pageNameParameter;
        $this->previousPageLabel = $previousPageLabel;
        $this->nextPageLabel = $nextPageLabel;
    }

    /**
     * @param string $pageNameParameter
     * @return $this
     */
    public function setPageNameParameter(string $pageNameParameter): PaginationOptionInterface
    {
        $this->pageNameParameter = $pageNameParameter;
        return $this;
    }

    /**
     * @param string $nextPageLabel
     * @return $this
     */
    public function setNextPageLabel(string $nextPageLabel): PaginationOptionInterface
    {
        $this->nextPageLabel = $nextPageLabel;
        return $this;
    }

    /**
     * @param string $previousPageLabel
     * @return $this
     */
    public function setPreviousPageLabel(string $previousPageLabel): PaginationOptionInterface
    {
        $this->previousPageLabel = $previousPageLabel;
        return $this;
    }

    /**
     * @return string
     */
    public function getNextPageLabel(): string
    {
        return $this->nextPageLabel;
    }

    /**
     * @return string
     */
    public function getPageNameParameter(): string
    {
        return $this->pageNameParameter;
    }

    /**
     * @return string
     */
    public function getPreviousPageLabel(): string
    {
        return $this->previousPageLabel;
    }
}
