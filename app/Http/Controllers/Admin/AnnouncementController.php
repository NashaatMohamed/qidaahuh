<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Validator;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'text' => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validated->fails())

         return response()->json($validated->errors());

            $filename = '';
            $filename = uploadImage("Announcements",$request->image);

            $Announcement = Announcement::create([
                'text' =>$request->text,
                'image' => $filename,
            ]);

            return $Announcement;
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
        //
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

        $Announcement = Announcement::find($id);

        $validated = Validator::make($request->all(),[
            'text' => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validated->fails())

         return response()->json($validated->errors());

                    $Announcement->text = $request->text;
                    if($request->has('image'))
                    $filename = uploadImage("Announcements",$request->image);
                    $Announcement->image = $filename;
                    $Announcement->update();
            return $Announcement;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Announcement = Announcement::find($id);
        if(!$Announcement)
        return response()->json("the Announcement is not found");

        $Announcement->delete();
         return response()->json("the Announcement is deleted");

    }
}
