<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    function all(){
        $id=auth()->user()->id;
        $notice=Notification::where('user_id','=',$id)->orderBy("id",'desc')->get();
        return view('all.Notification',['notice'=>$notice]);
    }

    
}
