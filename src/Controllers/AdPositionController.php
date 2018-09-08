<?php
/**
 * Author: XiaoFei Zhai
 * Date: 2018/7/20
 * Time: 14:00
 */

namespace Jcove\Ad\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Jcove\Restful\Restful;

class AdPositionController extends Controller
{
    use Restful;


    /**
     * AdPositionController constructor.
     */
    public function __construct()
    {
        $this->model                            =   app('Jcove\Ad\Models\AdPosition');
    }

    protected function validator($data){
        return Validator::make($data,[
            'name'                  =>  'required',
            'position'              =>  'required',
        ]);
    }

    public function search(){
        $q                                      =   request()->q;
        if(empty($q)){
           throw new \Exception('keywords is required:q');
        }
        $where                                  =   [];
        $this->model                            =   $this->model->where('name','like','%'.$q.'%');
        $list                                   =   $this->model->where($where)->paginate(config('restful.page_rows'));
        $this->setData($list);
        return $this->respond($this->data);
    }

    public function show($id)
    {
        if(is_string($id)){
            return $this->getByPosition($id);
        }
        $this->model                        =   $this->model->where('id',$id)->firstOrFail();
        $this->data['data']                 =   $this->model;
        return $this->respond($this->data);
    }

    protected function getByPosition($position){
        $this->model                        =   $this->model->where('position',$position)->firstOrFail();
        $this->data['data']                 =   $this->model;
        return $this->respond($this->data);
    }
}