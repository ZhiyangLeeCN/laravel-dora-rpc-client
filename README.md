# laravel-dora-rpc-client

DoraRPC Client for Laravel5 on [xcl3721/Dora-RPC](https://github.com/xcl3721/Dora-RPC).

## Install

```shell
composer require zhiyanglee/laravel-dorarpc-client:master-dev
```
## Configure

`config/doraclient.php`

```php
return [

    'clientConfig'    =>  [

        'group1' => [

            ['ip'   =>  '127.0.0.1', 'port' =>  9567],

        ]

    ],

    'clientMode'    =>    [

        'type'  =>  1,

        'group' =>  'group1'

    ]

];
```

## For Laravel

Add the following line to the section `providers` of `config/app.php`:

```php
'providers' => [
    //...
    ZhiyangLee\LaravelDoraRpc\Client\DoraRpcClientServiceProvider,
],
```

run artisan:

```php
php artisan vendor:publish
```

## Usage

```php
use ZhiyangLee\LaravelDoraRpc\Client\Facades\DoraRpcClient;

//single && sync
$ret = DoraRpcClient::singleAPI("/module_a/abc" . 1, array("mark" => 234, "foo" => 1), \DoraRPC\DoraConst::SW_MODE_WAITRESULT, 1);
var_dump("single sync", $ret);

//single call && async
$ret = DoraRpcClient::singleAPI("/module_b/abc" . 2, array("yes" => 21321, "foo" => 2), \DoraRPC\DoraConst::SW_MODE_NORESULT, 1);
var_dump("single async", $ret);

//single call && async
$ret = DoraRpcClient::singleAPI("/module_c/abd" . 3, array("yes" => 233, "foo" => 3), \DoraRPC\DoraConst::SW_MODE_ASYNCRESULT, 1);
var_dump("single async result", $ret);

//---------multi---------

//multi && sync
$data = array(
    "oak" => array("name" => "/module_c/dd" . 4, "param" => array("uid" => "ff")),
    "cd" => array("name" => "/module_f/ef" . 5, "param" => array("pathid" => "fds")),
);
$ret = DoraRpcClient::multiAPI($data, \DoraRPC\DoraConst::SW_MODE_WAITRESULT, 1);
var_dump("multi sync", $ret);

//multi && async
$data = array(
    "oak" => array("name" => "/module_d/oakdf" . 6, "param" => array("dsaf" => "32111321")),
    "cd" => array("name" => "/module_e/oakdfff" . 7, "param" => array("codo" => "f11ds")),
);
$ret = DoraRpcClient::multiAPI($data, \DoraRPC\DoraConst::SW_MODE_NORESULT, 1);
var_dump("multi async", $ret);

//multi && async
$data = array(
    "oak" => array("name" => "/module_a/oakdf" . 8, "param" => array("dsaf" => "11")),
    "cd" => array("name" => "/module_b/oakdfff" . 9, "param" => array("codo" => "f11ds")),
);
$ret = DoraRpcClient::multiAPI($data, \DoraRPC\DoraConst::SW_MODE_ASYNCRESULT, 1);
var_dump("multi async result", $ret);

//get all the async result
$data = DoraRpcClient::getAsyncData();
var_dump("allresult", $data);

```

About `xcl3721/Dora-RPC` specific configuration and use, refer to: [xcl3721/Dora-RPC](https://github.com/xcl3721/Dora-RPC)

## License

MIT