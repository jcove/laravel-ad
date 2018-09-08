<?php
/**
 * Author: XiaoFei Zhai
 * Date: 2018/7/20
 * Time: 11:38
 */

namespace Jcove\Ad\Models;


use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    const IMAGE                         =   'image';
    const CODE                          =   'code';


    public function getCodeAttribute($value){
        if($this->getAttribute('type')==Ad::IMAGE){
            return storage_url($value);
        }
        return $value;
    }

    public static function list($position){
        return static ::where('position',$position)->get();
    }
}