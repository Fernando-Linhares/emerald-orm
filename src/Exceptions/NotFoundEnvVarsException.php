<?php

namespace Emerald\Orm\Exceptions;

class NotFoundEnvVarsException extends \Exception
{
    public function __construct($vars=[])
    {
        $message = 'Not Found Envivronment Variable';

        if(!empty($vars)){
            $message = 's';
            $message = ' ( ';

            foreach($vars as $key)
                $message .= " var -> {$key} ";

            $message = ' ) ';
        }

        parent::__construct($message);
    }
}