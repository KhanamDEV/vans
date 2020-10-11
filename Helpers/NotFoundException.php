<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 17/09/2020
 * Time: 4:35 PM
 **/


class NotFoundException extends Exception{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        Helpers::notFound();
    }
}