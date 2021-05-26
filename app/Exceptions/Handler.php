<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // method findOrFail return json if request is ajax or wantsJson
        if ($exception instanceof ModelNotFoundException) {
            return $request->ajax() || $request->wantsJson() ? response()->json([
                'result' => false,
                'errors' => ['Incorrect. The request did not return any results'],
            ], 404) : parent::render($request, $exception);
        }
        elseif ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'result' => false,
                'errors' => ['Incorrect. Endpoint not found.'],
            ], 404);
        }
        else {
            return parent::render($request, $exception);
        }
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'result' => false,
                'errors' => ['Unauthenticated'],
            ], 401);
        }

        return redirect()->guest(route('login'));
    }

    /**
     * Validation exception to JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'result'  => false,
            'message' => $exception->getMessage(),
            'errors'  => $this->transformErrors($exception),
        ], $exception->status);
    }

    /**
     * Reformat errors.
     * @param ValidationException $exception
     * @return array
     */
    private function transformErrors(ValidationException $exception)
    {
        $errors = [];

        foreach ($exception->errors() as $field => $message) {
            $errors[$field] = $message[0];
        }

        return $errors;
    }

}
