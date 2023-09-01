<?php

namespace App\Classe;
use Mailjet\Client;

class Mail
{
    private $api_key = '864deb2dd0a0386a011de1dd35f3d92a';

    public function send(){
        $mj = new Client($this->api_key);
        $mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "pilot@mailjet.com",
                        'Name' => "Mailjet Pilot"
                    ],
                    'To' => [
                        [
                            'Email' => "passenger1@mailjet.com",
                            'Name' => "passenger 1"
                        ]
                    ],
                    'Subject' => "Your email flight plan!",
                    'TextPart' => "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
                    'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3><br />May the delivery force be with you!"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());
    }
}