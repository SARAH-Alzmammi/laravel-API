<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificates::where('user_id',\Auth::user()->id)->get();
        return $certificates;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string'
        ]);

        $certificate = Certificates::create([
            'name' => $fields['name'],
            'description' => $fields['description'],
            'link' =>  $fields['link'],
            
            'user_id' =>\Auth::user()->id,
            
        ]);
        return response($certificate, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificates  $certificates
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Certificates::find($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificates  $certificates
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $certificate = Certificates::find($id);
        return $certificate;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificates  $certificates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $certificate = Certificates::find($id);
        $certificate->update($request->all());
        return $certificate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificates  $certificates
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Certificates::destroy($id);
    }
}
