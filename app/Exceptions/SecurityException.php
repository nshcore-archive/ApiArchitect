<?php 

namespace App\Exceptions;

use Jkirkby91\Boilers\RestServerBoiler\Exceptions\AccessDeniedHttpException;

class SecurityException extends AccessDeniedHttpException
{
    public function __construct($message = 'not acceptable security violation')
    {
        parent::__construct($message);
    }

}
