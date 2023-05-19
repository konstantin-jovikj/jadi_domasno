<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Mail\SendOffer;
use App\Models\Cook;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OfferController extends Controller
{
    public function viewOffers()
    {
        $offers = Offer::with('cook', 'user')->where('user_id', Auth::user()->id)->get();
        // dd(Auth::user()->id);
        return view('bootstrap_views.dashboards.user_offers', compact('offers'));
    }


    public function createOffer()
    {
        $cooks = Cook::with('user')->get();
        return view('bootstrap_views.tempviews.offer', compact('cooks'));
    }


    public function storeOffer(OfferRequest $request)
    {

        $offer = new Offer();

        $offer->user_id = Auth::user()->id;
        $offer->cook_id = $request->cook_recepient;
        $offer->title = $request->offer_title;
        $offer->content = $request->offer_text;

        $userEmail = Auth::user()->email;
        $cookEmail = Cook::with('user')->where('id', $request->cook_recepient)->first()->user->email;

        // dd($cookEmail);
        $data = [
            'from' => $userEmail,
            'to' => $cookEmail,
            'title' => $request->offer_title,
            'message' => $request->offer_text,
        ];
        // dd($data);
        Mail::to($cookEmail)->send(new SendOffer($data));
        $offer->save();
        return redirect()->route('view.offers')->with('success', 'New Offer Sucessfully send!');

    }

    public function destroyOffer(Offer $offer)
    {
        if($offer->delete()) {
            return ['success' => 'The offer is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }
}
