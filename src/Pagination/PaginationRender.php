<?php declare(strict_types=1);


namespace ChocoCode\Paginator\Pagination;

use ChocoCode\Paginator\Exception\NotSupportedEngineException;
use ChocoCode\Paginator\Exception\NotSupportedEngineExceptionInterface;
use ChocoCode\Paginator\Paginator\PaginatorInterface;
use Exception;

/**
 * Class PaginationRender
 * @package ChocoCode\Paginator\Pagination
 */
class PaginationRender implements PaginationRenderInterface
{
    /** @var string */
    const BOOTSTRAP_V4 = 'BOOTSTRAP_V4';
    /** @var string */
    const BOOTSTRAP_V5 = 'BOOTSTRAP_V5';
    /** @var string[] */
    private const TEMPLATE_ENGINES = [
        self::BOOTSTRAP_V4 => __DIR__ . '/../Ressources/boostrap/boostrap_4.php',
        self::BOOTSTRAP_V5 => __DIR__ . '/../Ressources/boostrap/boostrap_5.php',
    ];

    private string $content;

    /**
     * PaginationRender constructor.
     * @param PaginatorInterface $paginator
     * @param string $templateEngine
     * @throws NotSupportedEngineExceptionInterface
     */
    public function __construct(private PaginatorInterface $paginator, private string $templateEngine = self::BOOTSTRAP_V4 | self::BOOTSTRAP_V5)
    {
        $this->setTemplateEngine($templateEngine);
    }

    public function rende(): void
    {
        ob_start();
        extract($this->paginator->getPaginationData());
        require self::TEMPLATE_ENGINES[$this->templateEngine];
        echo $this->content = ob_get_clean();
    }

    /**
     * @throws NotSupportedEngineExceptionInterface
     */
    public function setTemplateEngine(string $templateEngine): self
    {
        if (!in_array($templateEngine, [self::BOOTSTRAP_V4, self::BOOTSTRAP_V5])) {
            throw new NotSupportedEngineException(sprintf("This template engine is not supported, please use one of the [%s, %s]", self::BOOTSTRAP_V4, self::BOOTSTRAP_V5));
        }
        $this->templateEngine = $templateEngine;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateEngine(): string
    {
        return $this->templateEngine;
    }

    public function getRendeContent(): string
    {
        return $this->content;
    }
}

