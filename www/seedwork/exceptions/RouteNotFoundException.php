<?php

namespace SeedWork\Exceptions;

class RouteNotFoundException extends \Exception
{
   protected $message = "404 - Page Not Found or you don't have permission";
}