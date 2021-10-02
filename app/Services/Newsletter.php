<?php

namespace App\Services;

use League\Flysystem\Config;
use MailchimpMarketing\ApiClient;

class Newsletter
{
    //subscribe ,Unsubscribe

    public function __construct(protected ApiClient $client){

    }

    public function subscribe(string $email, string $list = null)
    {
        // ??= null safe assignment operator
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client ->lists->addListMember($list, [
            'email_address' => $email /*request('email')*/,
            'status' => 'subscribed'
        ]);
    }

   /* protected function client(){
        $mailchimp = new ApiClient();
        return $this->client->setConfig([
            'apiKey' => config('services.mailchimp.key')/*request('email')*///,/*config('services.mailchimp.key')*/
           // 'server' => 'us5'
     //   ]);
    //}*/


}
