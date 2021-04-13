<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ErrorNotification;

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
            if((app()->environment() == 'production')) {
                $this->sendExceptionNotification($e);
            }
        });
    }
    
    public function sendExceptionNotification(Throwable $exception)
    {
        try {
            $exception_array = [
                    'Msg' => $exception->getMessage(),
                    'GetCode' => $exception->getCode(),
                    'GetFile' => $exception->getFile(),
                    'GetLine' => $exception->getLine(),
                    'Url' => '<'.Request::url().'/>',
                    'Input' => json_encode(Request::all())
                    ];
            
            Notification::route('slack', config('settings.slack_hook'))
                    ->notify(new ErrorNotification($exception_array));
        } catch (Exception $e) {
            dd($e);
        }
    }
}
