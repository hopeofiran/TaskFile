<?php

namespace App\Http\Macros;

use Illuminate\Http\Response;

/**
 * Class ResponseMacro
 *
 * @package App\Http\Macros
 *
 * @method static \Illuminate\Http\JsonResponse success($massage, $data, int $statusCode = 0, int $httpStatusCode = 200)
 * @method static \Illuminate\Http\JsonResponse error($massage, $data, int $statusCode = -1, int $httpStatusCode = 400)
 */
class ResponseMacro extends Response
{
}
