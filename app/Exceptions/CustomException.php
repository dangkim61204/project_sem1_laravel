<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    


    public function render($request)
    {
        return response()->json([
            'error' => 'Unauthenticated',
            'message' => $this->getMessage(),
        ], 404);
    }
}
