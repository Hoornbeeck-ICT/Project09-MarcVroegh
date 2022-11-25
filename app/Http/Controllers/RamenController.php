//Berekent hoe vaak de ramen per jaar en dag gebruikt zijn en haalt alle 20 laatste data van database op en returnt view ramen met die data
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ramen;

class RamenController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $ramen = new ramen();

        $ramencountmaand = ramen::where('onoff', 'on')->whereDate('create_at', '>', now()->subDays(30))->get();
        $ramencountjaar = ramen::where('onoff', 'on')->whereDate('create_at', '>', now()->subDays(365))->get();
        $ramengetall = ramen::orderBy('id', 'desc')->take(20)->get();
        return view('ramen')->with('ramencountmaand', $ramencountmaand)->with('ramencountjaar', $ramencountjaar)->with('ramengetall', $ramengetall);
    }
}
