<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class NewsletterController extends Controller{

    //for single action controller
    public function __invoke(Newsletter $newsletter){

        //ddd($newsletter);

        //validation
        request()->validate(['email' => 'required|email']);

        try {
            //$newsletter = new AppServicesNewsletter();
            $newsletter->subscribe(request('email'));

            /* $response = $mailchimp->lists->addListMember('dff4472fbc',[
                 'email_address'=>request('email'),
                 'status'=>'subscribed'
             ]);*/

        } catch (Exception $exception) {
            throw IlluminateValidationValidationException::withMessages([
                'email' => 'This email could not be added.']);
        }
        return redirect('/')->with('success', 'Thank you for subscription,You will receive our last news on your email');

        //members list
        //$response = $mailchimp->lists->getListMembersInfo('dff4472fbc');
        //
        /* $response = $mailchimp->lists->getList('dff4472fbc');*/
        //get total contacts
        /*$response = $mailchimp->lists->getAllLists();*/
        //ddd($response);
        /*$response = $mailchimp->ping->get();
        ddd($response);
        //print_r($response);*/
    }

}
