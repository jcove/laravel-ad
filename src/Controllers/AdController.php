<?php
/**
 * Author: XiaoFei Zhai
 * Date: 2018/7/20
 * Time: 11:39
 */

namespace Jcove\Ad\Controllers;



use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Jcove\Restful\Restful;

class AdController extends Controller
{
    use Restful;


    /**
     * AdController constructor.
     */
    public function __construct()
    {
        $this->model                        =   app('Jcove\Ad\Models\Ad');
    }

    protected function validator($data){
        return Validator::make($data,[
            'name'                  =>  'required',
            'code'                  =>  'required',
            'position'              =>  'required',
            'type'                  =>  'required|in:image,text,code',
            'link'                  =>  'required|url',
        ]);
    }

    protected function where(){
        $position                   =   request()->position;
        $where                      =   [];
        if($position){
            $where['position']      =   $position;
        }
        return $where;
    }
}