<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($massage, $data, int $statusCode = 0, int $httpStatusCode = 200) {
            return response()->json([
                'message'     => $massage,
                'status_code' => $statusCode,
                'data'        => $data,
                'errors'      => false,
            ], $httpStatusCode);
        });
        Response::macro('error', function ($massage, $data, int $statusCode = -1, int $httpStatusCode = 400) {
            return response()->json([
                'message'     => $massage,
                'status_code' => $statusCode,
                'data'        => $data,
                'errors'      => true,
            ], $httpStatusCode);
        });
    }
}
