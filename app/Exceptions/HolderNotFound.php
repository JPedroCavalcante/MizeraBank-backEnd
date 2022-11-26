<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class HolderNotFound extends Exception
{
    public function report()
    {

    }

    public function render()
    {
        return response()->json([
            'errors' => [
                'message' => 'Titular não localizado',
                'code' => ResponseAlias::HTTP_NOT_FOUND,
            ]
        ], ResponseAlias::HTTP_NOT_FOUND);
    }
}
