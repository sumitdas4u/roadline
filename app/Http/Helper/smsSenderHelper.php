<?php
namespace App\Http\Helper;

/**
 * class MSG91 to send SMS on Mobile Numbers.
 * @author Shashank Tiwari
 */
class smsSenderHelper {

    function __construct() {

    }


    private $API_KEY = 'gWrzHUd8kHqnZcYa';
    private $SENDER_ID = "LOADLN";

    private $RESPONSE_TYPE = 'json';

    public  function sendSMS($OTP, $mobileNumber){
        $isError = 0;
        $errorMessage = true;

        //Your message to send, Adding URL encoding.
        $message = "Your LoadLine OTP CODE is :". $OTP;


        //Preparing post parameters
        $postData = array(
            'apikey' => $this->API_KEY,
            'number' => $mobileNumber,
            'message' => $message,
            'senderid' => $this->SENDER_ID,
            'format' => $this->RESPONSE_TYPE
        );

        $url = "http://sms.keylines.net/V2/http-api.php";

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => false,
            CURLOPT_POSTFIELDS => $postData
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output =  json_decode(curl_exec($ch));

        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);


        if($output->status!="OK"){
            return array('error' => 1 , 'message' => $output->message);
        }else{
            return array('error' => 0 );
        }
    }
}
?>
