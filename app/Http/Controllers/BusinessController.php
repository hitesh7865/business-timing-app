<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

        if ($request->hasFile('logo')) {
            $imageName = Str::uuid()->toString() . '.' . $request->file('logo')->extension();
            $imagePath = $request->file('logo')->storeAs('images', $imageName, 'public');
        }

        $business = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'logo' => !empty($request->logo) ? $imagePath : null
        ];

        Business::create($business);

        return redirect()->route('index')->withFlashSuccess("Business Created Successfully");
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

        if ($request->hasFile('logo')) {
            $imageName = Str::uuid()->toString() . '.' . $request->file('logo')->extension();
            $imagePath = $request->file('logo')->storeAs('images', $imageName, 'public');
        }

        $business = [
                        'name' => $request->name,
                        'phone_number' => $request->phone_number,
                        'logo' => !empty($request->logo) ? $imagePath : null
                    ];

        Business::where('id',$id)->update($business);
        return redirect()->route('index')->withFlashSuccess("Business Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Business::where('id',$id)->delete();
        return redirect()->route('index')->withFlashDanger("Business Deleted Successfully");
    }
}
