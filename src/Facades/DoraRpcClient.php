<?php namespace ZhiyangLee\Facades;

/**
 * Created by PhpStorm.
 * User: zhiyanglee
 * Date: 6/25/16
 * Time: 6:49 PM
 */

use Illuminate\Support\Facades\Facade;

class DoraRpcClient extends Facade
{
    public static function getFacadeAccessor() {return 'DoraRPC\Client';}
}