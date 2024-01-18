<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Midea\Api\Exception;

use Midea\Api\Constants\MideaErrorCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;

class PayException extends ServerException
{
    public function __construct(int $code = 0, string $message = null, Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = MideaErrorCode::getMessage($code);
        }

        parent::__construct($message, $code, $previous);
    }
}
