<?php
    $num = intval($_GET["cpu"]);

    if ($num < 1) {
        $num = intval($_POST['cpu']);
    }

    if($num < 1) {
        $num = 1;
    }

    //$low = $num;
    //if($low < 1) {
    //    $low = 1;
    //}
    date_default_timezone_set('PRC');
    $start_time = date('Y-m-d h:i:s', time());
    // $rnum = rand($low, $num) * 1000;
    $rnum = $num * 1000;
    $obj = new \stdClass();
    $obj->start_time = $start_time;
    $obj->amount = $rnum;


    $begin = microtime(true);
    for($i=0; $i < $rnum; $i ++) {
        md5($i);
    }
    $duration = intval((microtime(true) - $begin)*1000);

    $obj->duration = $duration;
    
    echo json_encode($obj);

?>