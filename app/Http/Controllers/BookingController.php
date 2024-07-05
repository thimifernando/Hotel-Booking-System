<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $book = Booking::where('user_id',auth()->user()->id)->get();
        // dd($book);

        return view('booking.index', compact('book'));
    }
    

    public function create(Request $request)
    {
        $book =$request->query('id');
        return view('book', compact('book'));
    }

    public function store( Request $request)
    {   
        $roomId = $request->input('blog_id');
        $userID = $request->input('user_id');
        $book = new Booking();
       
        $book->blog_id = $roomId;
        $book->user_id = $userID;
        $book->name = $request->name;
        $book->email = $request->email;
        $book->mobile = $request->mobile;
        $book->status = '0';
        $checkIn = date('Y-m-d H:i:s', strtotime($request->check_in));
        $checkOut = date('Y-m-d H:i:s', strtotime($request->check_out));
        $book->check_in = $checkIn;
        $book->check_out = $checkOut;
        $book->adult = $request->adult;
        $book->child = $request->child;
        $book->r_count = $request->r_count;
        $book->message = $request->message;
    // dd($book);
        $book->save();

        return redirect()->route('senter')->with('notify_message', ['state' => 'success', 'msg' => 'Booking Successfully!']);

    }

    public function view(Request $request){



    }


}
