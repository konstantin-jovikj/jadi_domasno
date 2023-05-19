<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Mail\Subscribers;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function createSubscriber()
    {
        return view('bootstrap_views.tempviews.add_subscriber');
    }



    public function storeSubscriber(SubscriberRequest $request)
    {


        try {
            // Save  subscriber
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
            $subscriberId = $subscriber->id;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Внесената е-маил адреса не е валидна или веќе постои во нашата база.']);
        }

        try {
            // Send  email
            $data = [
                'from' => 'jadi_domasno@jadidomasno.com',
                'to' => $request->email,
                'title' => 'Успешно се претплативте на Јади Домашно',
                'id' =>  $subscriberId
            ];
            Mail::to($request->email)->send(new Subscribers($data));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Грешка при испраќање на е-маил. Обидете се повторно подоцна.']);
        }

        return response()->json(['success' => 'Успешно се претплативте на Јади Домашно!', 'id' => $subscriberId]);


    }


    public function unsubscribe($id)
    {
        $subscriber = Subscriber::find($id);
        if($subscriber == null) {
            return view('bootstrap_views.emails.subscriber_not_found');
        }
        if ($subscriber->delete()) {
            return view('bootstrap_views.emails.unsubscribe_confirmation');
        } else {
            return view('bootstrap_views.emails.unsubscribe_error');
        }
    }

    public function newDishNotification($id)
    {

    }
}
