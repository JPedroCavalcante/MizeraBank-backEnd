<?php

namespace App\Exceptions;

use Exception;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UnauthorizedException extends Exception
{
    public function render()
    {
        return response()->json([
            'errors' => [
                'message' => 'O usuário não possui permissão para executar essa ação!',
                'code' => ResponseAlias::HTTP_FORBIDDEN,
            ]
        ], ResponseAlias::HTTP_FORBIDDEN);
    }
}
