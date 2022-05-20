<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $likes=5;
    public function __construct()
    {
//        $this->middleware('mustAdminstrator');

    }

    public function testlike(){
        return view('testlike',['count'=>$this->likes]);
    }

    public function addone(){
        $likes=request('oldCount');
        return response()->json(['count'=>$likes+1]);
    }

}
