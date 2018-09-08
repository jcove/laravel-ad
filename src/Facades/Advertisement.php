<?php
/**
 * Author: XiaoFei Zhai
 * Date: 2018/7/20
 * Time: 14:08
 */

namespace Jcove\Ad\Facades;


use Illuminate\Support\Facades\Facade;

class Advertisement extends Facade
{
    public static function getFacadeAccessor(){
        return 'ad';
    }
}