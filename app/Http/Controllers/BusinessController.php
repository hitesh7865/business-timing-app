<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::get();

        return view('business.index',compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:businesses',
            'logo' => 'mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withFlashDanger($error);
        }

        $business = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'logo' => !empty($request->logo) ? $request->logo : null
        ];

        Business::create($business);

        return route('business.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::where('id',$id)->first();

        return view('business.edit',compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'logo' => 'mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withFlashDanger($error);
        }

        $business = [
                        'name' => $request->name,
                        'phone_number' => $request->phone_number,
                        'logo' => !empty($request->logo) ? $request->logo : null
                    ];

        Business::where('id',$id)->update($business);

        return route('business.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Business::where('id',$id)->delete();
        return back();
    }
}
