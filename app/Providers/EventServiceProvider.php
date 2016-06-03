<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Models\User;
use Helper;
use Hash;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        User::saving(function($users){
            
            if($users->__isset('password'))
            {
                $pass = $users->getAttribute('password');
                
                if( Hash::needsRehash($pass) )
                {
                    $users->setAttribute('password', bcrypt($pass) );
                }
            }
            
            if($users->__isset('password_confirmation'))
            {
                $users->__unset('password_confirmation');
            }
            
        });
    }
}
