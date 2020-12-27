<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sarfraznawaz2005\SSE\Facades\SSEFacade;

class SseController extends Controller
{
    // public function myMethod()
    // {
    // SSEFacade::notify('hello world....');
    // // return view('sse/view',['notifikasi'=>$notifikasi]);
    
    // }

    public function myMethod()
    {
     SSEFacade::notify('hello world....', 'info', 'onclick');
    
    // or via helper
    // sse_notify('hi there', 'info', 'UserLoggedIn');
    }
}
