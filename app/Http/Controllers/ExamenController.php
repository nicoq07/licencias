<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class ExamenController extends Controller
{
    //

    public function cuestionarioInicial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipo_documento' => 'bail|required',
            'documento' => 'required|numeric',
            'utiliza_anteojos' => 'required'
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'errors' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ]
            );
        }
        return response('ok', 200);
    }
}
