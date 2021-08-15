<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Certificates;



class ShareController extends Controller
{
    
     /**
     * Search for a name
     *
     * @param  str  $username
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $username)
    {
        //Do not support this functionlaty yet!
        // $certificates = Certificates::where('username',$username)->get();

        return '$certificates';
    }



    public function show($id)
    {
        // return Certificates::find($id);
    }

}
