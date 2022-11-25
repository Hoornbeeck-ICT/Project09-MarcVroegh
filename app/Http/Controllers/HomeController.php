///Fetcht alle data die nodig is voor de home view en returnt de view home met die data
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beweging;
use App\Models\ramen;
use App\Models\rookmelding;
use App\Models\verlichting;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $ramen = new ramen();
        $beweging = new beweging();
        $rookmelding = new rookmelding();
        $verlichting = new verlichting();

        $ramenonderlateststate = ramen::where('waar', 'onder')->orderBy('id', 'desc')->take(1)->get();
        $ramenbovenlateststate = ramen::where('waar', 'boven')->orderBy('id', 'desc')->take(1)->get();

        $bewegingonderlateststate = beweging::where('waar', 'onder')->orderBy('id', 'desc')->take(3)->get();
        $bewegingbovenlateststate = beweging::where('waar', 'boven')->orderBy('id', 'desc')->take(3)->get();

        $date = new DateTime;
        $date->modify('-5 minutes');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $rookmeldingonderlateststate = rookmelding::where('create_at', '>', $formatted_date)->get();

        $verlichtingonderlateststate = verlichting::where('waar', 'onder')->orderBy('id', 'desc')->take(4)->get();
        $verlichtingbovenlateststate = verlichting::where('waar', 'boven')->orderBy('id', 'desc')->take(4)->get();

        return view('home')->with('ramenonderlateststate', $ramenonderlateststate)->with('ramenbovenlateststate', $ramenbovenlateststate)
        ->with('bewegingonderlateststate', $bewegingonderlateststate)->with('bewegingbovenlateststate', $bewegingbovenlateststate)
        ->with('rookmeldingonderlateststate', $rookmeldingonderlateststate)->with('verlichtingonderlateststate', $verlichtingonderlateststate)
        ->with('verlichtingbovenlateststate', $verlichtingbovenlateststate);
    }
}
