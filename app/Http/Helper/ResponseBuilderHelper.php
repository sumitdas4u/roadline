<?php

namespace App\Http\Helper;

class ResponseBuilderHelper {

    public static function result($message='',$code='',$data=''){
        return response()->json(
            [
                "message"=> $message,
                "code"=>$code,
                "data"=>$data
            ], $code);         
    }
    
}


?>