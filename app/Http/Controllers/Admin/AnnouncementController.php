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
    public function index(Request $request)
    {
        $allAnoncements = Announcement::paginate(10);

        // $q = request()->all();
        // $allAnoncements = Announcement::where('text','LIKE',"%$q%")->paginate(5);
        return view("admin.Anoncement.index",compact("allAnoncements"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.Anoncement.create");
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

            return redirect()->route("Anoncement.index");
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
                $Announcement = Announcement::find($id);
                return view("admin.Anoncement.edit",compact('Announcement'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validated->fails())

         return response()->json($validated->errors());
                    $Announcement->text = $request->text;
                    if($request->has('image')){
                    $filename = '';
                    $filename = uploadImage("Announcements",$request->image);
                    $Announcement->image = $filename;
                    }
                    $Announcement->update();
            return redirect()->route("Anoncement.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $Announcement = Announcement::find($id);

        $Announcement->delete();
        return redirect()->route("Anoncement.index");
    }
}
