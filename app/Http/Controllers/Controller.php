<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The model which is the Controller's subject
     *
     * @var Model
     */
    protected static $model;

    /**
     * Creates the message to be returned after a
     * Controller's method execution
     *
     * @param string $action
     * @param bool $success
     *
     * @return string
     */
    protected static function getMessage($action, bool $success)
    {
        $type = $success ? 'success' : 'error';

        return __("crud.{$action}.{$type}", ['model' => class_basename(self::$model)]);
    }
}
