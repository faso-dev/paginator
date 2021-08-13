<?php declare(strict_types=1);


namespace ChocoCode\Paginator\Exception;


use Exception;
use JetBrains\PhpStorm\Pure;

/**
 * Class NotSupportedEngineException
 * @package ChocoCode\Paginator\Exception
 */
class NotSupportedEngineException extends Exception implements NotSupportedEngineExceptionInterface
{
    /**
     * NotSupportedEngineException constructor.
     * @param string $message
     * @param int $code
     */
    #[Pure] public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }

}
