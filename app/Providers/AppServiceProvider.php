<?php

namespace App\Providers;

use App\Services\Newsletter;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use App\Services\MailchimpNewsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    //to add dependency to the server container
    public function register(){

        app()->bind(Newsletter::class ,function () {
          // $client = new ApiClient();
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key')/*request('email')*/,/*config('services.mailchimp.key')*/
                'server' => 'us5'
            ]);
            return new Newsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        Model::unguard();

        Facades\Gate::define('admin', function (User $user) {
            /*in case we have one admin only*/
            return $user->username ==='AlaShakko';
        });
    }



}
