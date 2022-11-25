///Controller waarin word uitgerekend hoe lang er beweging is geweest en waar alle bewegingen worden opgevraagd
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beweging;

class BewegingController extends Controller
{
    public function index()
    {
        $beweging = new beweging();
        $beweginggetall = beweging::orderBy('id', 'desc')->take(20)->get();

        $bewegingonderlateststateon = beweging::where('onoff', 'on')->where('waar', 'onder')->orderBy('id', 'asc')->get();
        $bewegingonderlateststateoff = beweging::where('onoff', 'off')->where('waar', 'onder')->orderBy('id', 'asc')->get();

        $bewegingbovenlateststateon = beweging::where('onoff', 'on')->where('waar', 'boven')->orderBy('id', 'asc')->get();
        $bewegingbovenlateststateoff = beweging::where('onoff', 'off')->where('waar', 'boven')->orderBy('id', 'asc')->get();

        $i = 0;
        $try = 0;

        $trygood = $bewegingbovenlateststateon[$i];
        $trygood2 = $bewegingbovenlateststateoff[$try];

        $firstTime2=strtotime($trygood['create_at']);
        $lastTime2=strtotime($trygood2['create_at']);

        $size = count($bewegingbovenlateststateon);
        $amountboven = array();

        while($size > $i) {
            $trygood = $bewegingbovenlateststateon[$i];
            $trygood2 = $bewegingbovenlateststateoff[$try];
            if($trygood2['create_at'] > $trygood['create_at']) {
                $firstTime=strtotime($trygood['create_at']);
                $lastTime=strtotime($trygood2['create_at']);
                $timeDiff=$lastTime-$firstTime;
                array_push($amountboven, $timeDiff);
                $try++;
                $i++;
            }
            else {
                $try++;
            }
        }

        $i2 = 0;
        $try2 = 0;

        $trygood2 = $bewegingonderlateststateon[$i2];
        $trygood22 = $bewegingonderlateststateoff[$try2];

        $firstTime2=strtotime($trygood2['create_at']);
        $lastTime2=strtotime($trygood22['create_at']);

        $size2 = count($bewegingonderlateststateon);
        $amountonder = array();

        while($size2 > $i2) {
            $trygood2 = $bewegingonderlateststateon[$i2];
            $trygood22 = $bewegingonderlateststateoff[$try2];
            if($trygood22['create_at'] > $trygood2['create_at']) {
                $firstTime2=strtotime($trygood2['create_at']);
                $lastTime2=strtotime($trygood22['create_at']);
                $timeDiff2=$lastTime2-$firstTime2;
                array_push($amountonder, $timeDiff2);
                $try2++;
                $i2++;
            }
            else {
                $try2++;
            }
        }
        return view('beweging')->with('beweginggetall', $beweginggetall)->with('amountboven', $amountboven)->with('amountonder', $amountonder);
    }
}
