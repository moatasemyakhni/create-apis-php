<?php
    function christmas() {
        $today = time();
        $christmas = strtotime("December 25 ". date("Y"));
        if(($christmas - $today) < 0) {
            $christmas = strtotime("December 25 ". strval(intval(date("Y")) + 1));
        }
        $timeDiff = $christmas - $today;
        $numberDays = ['daysLeft' => floor($timeDiff/86400)];
        
        return json_encode($numberDays);
    }
    echo christmas();
?>