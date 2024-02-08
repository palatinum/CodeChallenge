<?php

namespace App\Exceptions;

use Exception;

class LeadNotFound extends Exception
{
    public function render($request)
    {
        return response()->json(
            [
                'error' => "Lead not found"
            ],
            404
        );
    }
}
