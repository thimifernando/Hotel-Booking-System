<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        $con = Contact::all();
        return view('contact.index', compact('con'));
    }

   public function create()
   {
        return view('contact');
   }

   public function store(Request $request)
   {
    $con = new Contact();
    $con->name = $request->name;
    $con->email = $request->email;
    $con->phone = $request->phone;
    $con->subject = $request->subject;
    $con->message = $request->message;

    $con->save();

    return redirect()->route('senter')->with('notify_message', ['state' => 'success', 'msg' => 'contact Successfully!']);
   }

   public function destroy($id)
   {
       $contact = Contact::find($id);

       if (!$contact) {
           return redirect()->route('contact.index')->with('notify_message', ['state' => 'error', 'msg' => 'Contact not found!']);
       }

       $contact->delete();

       return redirect()->route('contact.index')->with('notify_message', ['state' => 'success', 'msg' => 'Contact deleted successfully!']);
   }
}
