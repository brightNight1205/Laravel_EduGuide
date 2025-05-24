<?php

use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

function error_response(Throwable $exception)
{
    // Log the exception for debugging purposes
    $statusCode = 500;
    $message = 'Something went wrong';
    $errors = [];

    if ($exception instanceof ValidationException) {
        $statusCode = 422;
        $message = 'Validation failed';
        $errors = $exception->errors();
    } elseif ($exception instanceof HttpException) {
        $statusCode = $exception->getStatusCode();
        $message = $exception->getMessage() ?: 'HTTP error';
    } else {
        $message = $exception->getMessage();
    }

    return response()->json([
        'success' => false,
        'message' => $message,
        'errors' => $errors,
    ], $statusCode);
}
