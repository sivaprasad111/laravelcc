<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $std=booking::latest()->paginate(3);
        return view('website.index',compact('std'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $image=$request->file('image');
        $my_image=rand().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('upload'),$my_image);


        Booking::create([
            'room'=>$request->room,
            'email'=>$request->email,
            'address'=>$request->address,
            'image'=>$my_image,
        ]);
        return redirect()->route('booking.index')->with('success','Sir data will inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('website.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.

     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('website.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
       $my_image=$request->my_image;

       $image=$request->file('image');
       if ($image!="") {
           $request->validate([
                "room"=>"required",
                "email"=>"required",
                "address"=>"required",
                "image"=>"image"
           ]);
           $my_image=rand().'.'. $image->getClientOriginalExtension();
           $image->move(public_path('upload'),$my_image);
       }else{
        $request->validate([
            "room"=>"required",
            "email"=>"required",
            "address"=>"required",

       ]);
       }



        $booking->update([
            "room"=>$request->room,
            "email"=>$request->email,
            "address"=>$request->address,
            "image"=>$my_image,
        ]);

       return redirect()->route('booking.index')->with('success','Sir data will updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('error','Sir data will Deleted successfully');
    }
}
