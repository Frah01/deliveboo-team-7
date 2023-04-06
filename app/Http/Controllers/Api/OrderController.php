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

        if($form_data['pagamento'] == false){

            $validator = Validator::make($form_data, [
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
            else{
                return response()->json([
                    'success'=>true,
                    'results'=>$form_data
                ]);
            }
        }
        else{

            $new_order = new Order();
            $new_order['slug'] = $form_data['nome'];
            $new_order['nome'] = $form_data['nome'];
            $new_order['cognome'] = $form_data['cognome'];
            $new_order['indirizzo'] = $form_data['indirizzo'];
            $new_order['telefono'] = $form_data['telefono'];
            $new_order['data'] = '2023/04/05';
            $new_order['prezzo_totale'] = $form_data['prezzo_totale'];
            $new_order->save();
        }



        // Mail::to('info@deliveboo.com')->send(new GuestContact($newContact));
        // return response()->json([
        //     'success' => true,
        // ]);
    }
}
