<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use \Symfony\Component\HttpKernel\Exception\HttpException;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof ModelNotFoundException){
            return $this->errorJson('No se encuentra el elemento buscado dentro de '.$exception->getModel(),404);
        }
        if($exception instanceof AuthenticationException){
            return $this->errorJson('Se ha producido un error de autenticación: '.$request,404);
        }
        if($exception instanceof AuthorizationException){
            return $this->errorJson('Se ha producido un error de autorizacion: '.$exception->getMessage(),403);
        }
        if($exception instanceof MethodNotAllowedException){
            return $this->errorJson('El método no se ha definido',405);
        }
        if($exception instanceof NotFoundHttpException){
            return $this->errorJson('La URL no se ha encontrado',404);
        }
        if($exception instanceof HttpException){
            return $this->errorJson('Se ha producido un error: '.$exception->getMessage(),$exception->getStatusCode());
        }

        return $this->errorJson("Error no identificado: ".$exception->getMessage(),500);
    }

    private function errorJson($mensaje,$conError){
        return response()->json(['mensaje'=>$mensaje],$conError);
    }
}
