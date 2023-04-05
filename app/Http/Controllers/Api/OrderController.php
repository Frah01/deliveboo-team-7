<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\GuestContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $form_data = $request->all();

        $validator = Order::make($form_data, [
            'nome' => 'required',
            'cognome' => 'required',
            'indirizzo' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $new_order = new Order();
        $new_order->fill($form_data);
        $new_order->save();

        // Mail::to('info@deliveboo.com')->send(new GuestContact($newContact));
        // return response()->json([
        //     'success' => true,
        // ]);
    }
}
