<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Carbon\Carbon;

use App\Message;
use App\Deliverer;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){

            $deliverers = Deliverer::all();

            foreach ($deliverers as $deliverer) {
                $difference = $deliverer->bonus_timer->diffInWeeks();

                if ($deliverer->bonus == '0' && $difference >= 6) {
                    $message = new Message;
                    $message->setAttribute('type', "bonus");
                    $message->setAttribute('message', $deliverer->firstname . " " . $deliverer->lastname . " heeft " . $difference . " weken geen klachten gekregen. (Bonus: " . $deliverer->bonus_amount . " euro)");
                    $message->setAttribute('status', "Unread");
                    $message->save();

                    $deliverer->bonus = '1';
                    $deliverer->save();
                }
            }
            
            //$test = $difference;

            //return $view->with('test', $test);
        });
    }
}
