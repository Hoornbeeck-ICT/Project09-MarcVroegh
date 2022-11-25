
        $trygood = $bewegingbovenlateststateon[$i];
        $trygood2 = $bewegingbovenlateststateoff[$try];

        $size = count($bewegingbovenlateststateon);
        $a = array();

        while($i < $size) {
            if($trygood2['create_at'] > $trygood['create_at']) {
                $firstTime=strtotime($trygood['create_at']);
                $lastTime=strtotime($trygood2['create_at']);
                $timeDiff=$lastTime-$firstTime;
                array_push($timeDiff);
                $try = $try + 1;
                $i = $i + 1;
            }
            else {
                $try = $try + 1;
            }
        }