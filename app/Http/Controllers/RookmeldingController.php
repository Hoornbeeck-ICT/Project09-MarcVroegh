<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rookmelding;
use Carbon\Carbon;

class RookmeldingController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $rookmelding = new rookmelding();

        $rookmeldingcountmaand = rookmelding::whereDate('create_at', '>', now()->subDays(30))->get();
        $rookmeldingcountjaar = rookmelding::whereDate('create_at', '>', now()->subDays(365))->get();
        $rookmeldinggetall = rookmelding::orderBy('id', 'desc')->take(20)->get();
        return view('rookmelding')->with('rookmeldingcountmaand', $rookmeldingcountmaand)->with('rookmeldingcountjaar', $rookmeldingcountjaar)->with('rookmeldinggetall', $rookmeldinggetall);
    }
}
