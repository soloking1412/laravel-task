<?php

namespace Modules\Newsletter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Newsletter\Models\Subscriber;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter::index');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create($request->only('email'));

        return back()->with('success', 'You have been subscribed to the newsletter!');
    }
}
