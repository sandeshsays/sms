<?php
namespace sandeshsays\SMS;

class SMS
{
    /**
     * Multiplies the two given numbers
     * @param string $phone_number
     * @param string $message
     */
    public function sendSMS($phone_number, $message)
    {
        $isError = 0;
        $errorMessage = true;

        $args = http_build_query(array(
            'token' => 'token',
            'from' => 'code',
            'to' => $phone_number, //'<comma_separated 10-digit mobile numbers>',
            'text' => $message
        ));

        $url = "http://api.sparrowsms.com/v2/sms/";

    # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // curl_close($ch);

         //Print error if any
        if ($status_code != 200) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);


        if ($isError) {
            return array('error' => 1, 'message' => $errorMessage);
        } else {
            return array('error' => 0);
        }

    }
}