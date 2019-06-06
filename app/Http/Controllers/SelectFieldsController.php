<?php

namespace App\Http\Controllers;

use App\Cacheable\CacheableFields;
use App\Eloquent\EloquentFields;
use App\Field;
use Illuminate\Support\Facades\Redis;

class SelectFieldsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show select fields page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        if(! auth()->user()->hasSetFields()){
            return view('select_fields', [
                'mainEduFields'   => resolve('Fields')->mainFields('edu'),
                'mainEntmtFields' => resolve('Fields')->mainFields('entmt'),
            ]);
        }

        return abort(404);
    }
}
