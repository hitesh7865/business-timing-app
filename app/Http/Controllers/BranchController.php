<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchImage;
use App\Models\BranchUnavailableDate;
use App\Models\Business;
use App\Models\Day;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::with('business')->get();
        return view('branch.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businesses = Business::orderBy('name','asc')->get();
        return view('branch.create',compact('businesses'));
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
            'business_id' => 'required',
            'name' => 'required',
            'images.*' => 'mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withFlashDanger($error);
        }

        $branch = new Branch;
        $branch->business_id = $request->business_id;
        $branch->name = $request->name;
        $branch->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $branch_image = new BranchImage;
                $imageName = Str::uuid()->toString() . '.' . $file->extension();
                $imagePath = $file->storeAs('images', $imageName, 'public');
                $branch_image->branch_id = $branch->id;
                $branch_image->image_name = $imagePath;
                $branch_image->save();
            }
        }

        if ($request->days) {
            foreach ($request->days as $day) {
                $day = new Day;
                $day->branch_id = $branch->id;
                $day->number = $day;
                $day->save();

                if(!empty($request->start_times.$day)){
                    foreach($request->start_times.$day as $key => $start_time){
                        $working_hour = new WorkingHour;
                        $working_hour->branch_id = $branch->id;
                        $working_hour->day_id = $day->id;
                        $working_hour->start_time = $start_time;
                        $working_hour->end_time = $request->end_times.$day[$key];
                        $working_hour->save();
                    }
                }
            }
        }

        if(!empty($request->branch_unavailable_dates)){
            foreach($request->branch_unavailable_dates as $branch_unavailable_date){
                $BranchUnavailableDate = new BranchUnavailableDate;
                $BranchUnavailableDate->branch_id = $branch->id;
                $BranchUnavailableDate->unavailable_date = $branch_unavailable_date;
                $BranchUnavailableDate->save();
            }
        }
        return redirect()->route('branch.index')->withFlashSuccess("Branch Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::with(['business','images','WorkingHours','BranchUnavailableDates'])->where('id',$id)->first();
        return view('branch.view',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $businesses = Business::orderBy('name','asc')->get();
        $branch = Branch::with(['business','images','WorkingHours','BranchUnavailableDates'])->where('id',$id)->first();
        return view('branch.edit',compact('branch','businesses'));
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
            'images.*' => 'mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withFlashDanger($error);
        }

        Branch::where('id',$id)->update(['name' => $request->name]);

        $files = BranchImage::where('branch_id',$id)->pluck('image_name');
        foreach($files as $file){
            $filePath = 'public/images/'.$file;
            if (Storage::disk('local')->exists($filePath)) {
                Storage::disk('local')->delete($filePath);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $branch_image = new BranchImage;
                $imageName = Str::uuid()->toString() . '.' . $file->extension();
                $imagePath = $file->storeAs('images', $imageName, 'public');
                $branch_image->branch_id = $id;
                $branch_image->image_name = $imagePath;
                $branch_image->save();
            }
        }

        if ($request->days) {
            foreach ($request->days as $day) {
                $day = new Day;
                $day->branch_id = $id;
                $day->number = $day;
                $day->save();

                WorkingHour::where('branch_id',$id)->delete();
                if(!empty($request->start_times.$day)){
                    foreach($request->start_times.$day as $key => $start_time){
                        $working_hour = new WorkingHour;
                        $working_hour->branch_id = $id;
                        $working_hour->day_id = $day->id;
                        $working_hour->start_time = $start_time;
                        $working_hour->end_time = $request->end_times.$day[$key];
                        $working_hour->save();
                    }
                }
            }
        }

        BranchUnavailableDate::where('branch_id',$id)->delete();
        if(!empty($request->branch_unavailable_dates)){
            foreach($request->branch_unavailable_dates as $branch_unavailable_date){
                $BranchUnavailableDate = new BranchUnavailableDate;
                $BranchUnavailableDate->branch_id = $id;
                $BranchUnavailableDate->unavailable_date = $branch_unavailable_date;
                $BranchUnavailableDate->save();
            }
        }

        return redirect()->route('branch.index')->withFlashSuccess("Branch Updated Successfully");
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
        Branch::where('id',$id)->delete();
        BranchImage::where('branch_id',$id)->delete();
        BranchUnavailableDate::where('branch_id',$id)->delete();
        WorkingHour::where('branch_id',$id)->delete();
        return back()->withFlashDanger("Branch Deleted Successfully");
    }
}
