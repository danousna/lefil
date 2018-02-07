<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cas extends Model
{
    private static function parseCasXml($data) {        
        $xml = simplexml_load_string($data, "SimpleXMLElement", 0, "cas", true);
        $data = Array();

        if(isset($xml->authenticationSuccess)) {
            $data['username']   = (string) $xml->authenticationSuccess->user;
            $data['email']      = (string) $xml->authenticationSuccess->attributes->mail;
            $data['name']       = (string) $xml->authenticationSuccess->attributes->cn;
        } else {
            return -1;
        }

        return $data;
    }

    public static function login($service) {
        return redirect()->away('https://cas.utc.fr/cas/login?service='.$service);
    }

    // public static function auth() {
    //     $service = route('register');

    //     if (!isset($_GET['ticket']))
    //         return -1;

    //     $response = file_get_contents('https://cas.utc.fr/cas/serviceValidate?service='.$service.'&ticket='.$_GET['ticket']);

    //     if (empty($response))
    //         return -1;

    //     $user = Cas::parseCasXml($response);

    //     if (empty($user))
    //         return -1;

    //     if ($user == -1)
    //         return -1;

    //     return $user;
    // }

    public static function auth($service, $ticket) {
        $response = file_get_contents('https://cas.utc.fr/cas/serviceValidate?service='.$service.'&ticket='.$ticket);

        if (empty($response))
            return -1;

        $user = Cas::parseCasXml($response);

        if (empty($user))
            return -1;

        if ($user == -1)
            return -1;

        session([
            'username' => $user['username'],
            'email' => $user['email'],
            'name' => $user['name'],
        ]);

        return $user;
    }
}
