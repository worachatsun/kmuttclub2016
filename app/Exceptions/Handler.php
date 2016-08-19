<?php

namespace App\Exceptions;

use Exception;
use Log;
use Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        //dd(Request::server());
        Log::error($e,[
            'header' => Request::header(),
            'server' => Request::server(),
            'url' => Request::url(),
            'body' => Request::all()
        ]);

        //$error = array();
        //     'error' => $e,
        //     'header' => Request::header(),
        //     'server' => Request::server(),
        //     'url' => Request::url(),
        //     'body' => Request::all()
        // );

        //if ($this->shouldReport($e)) {
        //    dd("hello");
            app('sentry')->captureException($e);
        //}
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        return parent::render($request, $e);
    }
}
