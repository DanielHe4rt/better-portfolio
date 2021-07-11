<?php


namespace App\Http\Controllers\Mailer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Newsletter\Newsletter;

class NewsletterController extends Controller
{

    public function postNewsletter(Request $request)
    {
        app(Newsletter::class)->subscribe('danielheart@dev',['name' => 'danielreis'], 'subscriber');
        dd($request->all());
    }

}
