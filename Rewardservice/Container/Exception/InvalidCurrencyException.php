<?php

namespace Container\Exception;

use Exception;

class InvalidCurrencyException extends Exception
{
    protected $message = 'Invalid Currency Identifier';
    protected $code = 403;
}
