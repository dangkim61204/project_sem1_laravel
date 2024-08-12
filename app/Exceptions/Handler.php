<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->renderable(function (AuthorizationException $e, Request $request) {
        
            
        });
    }

   
    public function render($request, Throwable $exception)
    {
          if ($exception instanceof AuthorizationException) {
            //   return response()->view('backend.errors.403', [], 403);
            return redirect()->to(route('403.index'))->with('error', 'Unauthorized!');
          } 
       return parent::render($request, $exception);
    }

   
   



    
}
