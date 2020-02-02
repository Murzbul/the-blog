<?php

namespace App\Http\Exceptions;

use Flugg\Responder\Exceptions\Http\HttpException;
use Illuminate\Http\Response;

class TokenException extends HttpException
{
    protected $status = Response::HTTP_FORBIDDEN;
    protected $errorCode = 'forbidden';

    public function __construct(string $message = null, array $headers = null)
    {
        parent::__construct($message, $headers);
        $this->data = ['errors' => [$this->message, 'Invalid token']];
    }
}
