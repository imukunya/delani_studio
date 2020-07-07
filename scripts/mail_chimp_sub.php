<?php




$email = $_POST['email'];
$names = $_POST['names'];
$message = $_POST['message'];
    function subscribeEmail($email){
        $api_key = "797807566fffbf6019aa716c8699ab0f-us10"
        $status = "subscribe";
        $data = array(
            'apikey'        => $api_key,
            'email_address' => $email,
            'status'        => $status,
            'merge_fields'  => $merge_fields
        );
        $mail_chimp_caller = curl_init(); 
     
        curl_setopt($mail_chimp_caller, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
        curl_setopt($mail_chimp_caller, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
        curl_setopt($mail_chimp_caller, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($mail_chimp_caller, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($mail_chimp_caller, CURLOPT_CUSTOMREQUEST, 'PUT'); 
        curl_setopt($mail_chimp_caller, CURLOPT_TIMEOUT, 10);
        curl_setopt($mail_chimp_caller, CURLOPT_POST, true);
        curl_setopt($mail_chimp_caller, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($mail_chimp_caller, CURLOPT_POSTFIELDS, json_encode($data) ); 
     
        $result = curl_exec($mail_chimp_caller);
        return $result;
    }

?>