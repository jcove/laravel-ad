<?php
/**
 * Author: XiaoFei Zhai
 * Date: 2018/7/20
 * Time: 11:00
 */

namespace Jcove\Ad;


use Illuminate\Config\Repository;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Route;

class Advertisement
{
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session                  =   $session;
        $this->config                   =   $config;
    }

    public function routes(){
        $attributes = [
            'prefix'        => config('ad.route.prefix'),
            'namespace'     => 'Jcove\Ad\Controllers',
        ];

        Route::group($attributes, function ($router) {
            $router->group([], function ($router) {
                $router->resource('/ad/position', 'AdPositionController');
                $router->resource('/ad', 'AdController');
                $router->get('/ad/position/search', 'AdPositionController@search');
            });

        });
    }
}