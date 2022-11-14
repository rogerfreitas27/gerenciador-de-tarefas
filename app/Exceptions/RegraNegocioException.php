<?php

namespace App\Exceptions;

use Exception;

class RegraNegocioException extends Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }
   
public function render($request)
{
    
}
   
}
