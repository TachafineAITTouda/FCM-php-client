<?php

class FCMNotificationSenderService {
    
    private static $instance ;
    private $serviceToken;

    private static $firbaseServerUrl = "https://fcm.googleapis.com/fcm/send";
    
    private function __construct(){
        $this->setupServiceTokenFCM();
    }

    public static function getInstance(){
        if(FCMNotificationSenderService::$instance === null){
            FCMNotificationSenderService::$instance = new FCMNotificationSenderService();
        }
        return FCMNotificationSenderService::$instance;
    }

    private function setupServiceTokenFCM(){
        //READ THE TOKEN FROM THE .env FILE
        if (is_null($this->serviceToken)) {
            // delete this line if you are working with some Kind of Framework
            // and use the framework ENV system
            // if you are using laravel replace it with this 
            // $FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN = env('FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN');
            $FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN = $_ENV['FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN'];
            if($FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN !== null){
                $this->serviceToken = $FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN;
            }
            else{
                throw new Exception("Token Not Defined in the Envirement File");
            }
        }
    }

    public function sendMessageToDevices($title,$message,$idsArray)
    {
        $body = array (
            'notification' => array (
                "title" => $title ,
                "body" => $message
            ),
            "registration_ids" => $idsArray
        );
        $body = json_encode ( $body );
    
        $headers = array (
            'Content-Type: application/json',
            'Authorization: key=' . $this->serviceToken,
        );
        
    
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $headers
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

}