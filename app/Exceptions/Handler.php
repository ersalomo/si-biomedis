<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];
    public function render($request, $exception)
    {
        if ($exception instanceof AuthorizationException) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Kamu tidak ada akses untuk ini!'
                ], 403);
            }
            // // return redirect()->back();
            // abort(404);
        }
        return parent::render($request, $exception);
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
            // if ($e instanceof AuthorizationException) {
            //     abort(404);
            //     return back();
            // }
        });
    }
}
