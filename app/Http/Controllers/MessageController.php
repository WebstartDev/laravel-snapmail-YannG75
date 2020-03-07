<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Message;
use App\MessageData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Message $message)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|',
            'img' => 'mimes:jpeg,png,jpg,gif,svg',
            'message' => 'required'
        ]);



        $message->message = $request->message;

        $message->code = sha1(Str::random(15));
        if(isset($request->img)){
            $imageName = time() . '.' . request()->img->getClientOriginalExtension();
            $message->photo_url = $imageName;

            request()->img->move('../storage/app/public/images', $imageName);
        }

        $message->save();



        $messageData = new MessageData;
        $messageData->name = $request->name;
        $messageData->email = $request->email;
        $messageData->code = $message->code;

        Mail::to('newuser@example.com')->send(new OrderShipped($messageData));


        $success = "L'envoie de votre message est réussi !";

        return view('index',['success' => $success]);

    }

    /**
     * Display the specified resource.
     * @param $code
     * @param \App\Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($code, Message $message)
    {
        return view('show', ['messages' => $message->where('code', $code)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $code
     * @param \App\Message $message
     * @return void
     */
    public function edit($code ,Message $message)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $code
     * @param \App\Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($code ,Message $message)
    {
        $once= $message->where('code', $code)->first();
        $message->where('code', $code)->delete();
        return view('show', ['messages' => $once]);
    }

}
