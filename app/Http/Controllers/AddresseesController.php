<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Recipient;

class AddresseesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
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
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('addressees')
                ->withErrors($validator)
                ->withInput();
        }

        $recipient= new Recipient();
        $recipient->email=$request->get('email');
        $recipient->save();

        return redirect('addressees')->with('success', 'Information has been added');
    }

    /**
     * Delete recipient in Database.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $addressees = Recipient::find($id);
        $addressees->delete();

        return redirect('addressees')->with('success','Успешно!');
    }
}
