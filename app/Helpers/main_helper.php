<?php 
/*
|--------------------------------------------------------------------------
| Function to retrieve Static Variables used Globally
|--------------------------------------------------------------------------
*/

function paymentTerms()
{
    return array('1' => 'Advanced', '2' => 'Same Day', '3' => 'Next Day', '4' => '15 Days', '5' => '30 Days', '6' => '45 Days');
}

function getPaymentTerms($key)
{
    $paymentTermsArr = paymentTerms();
    return $paymentTermsArr[$key];
}

function get_var($var = 'USERTYPE', $KEY = NULL) {
    $r = false;
    switch ($var) {
        case 'USERTYPE':
            $r = array('0'=>'Admin','1'=>'Bailer','2'=>'End User','3'=>'Paper Mill','4'=>'Trader','5'=>'Transporter','10'=>'Other');
            if($KEY !== NULL) $r = $r[$KEY];
            break;
    }
    return $r;
}


function getMessageTiming($timestamp) {
    $currentTime = time();
    $messageTime = strtotime($timestamp);
    $timeDiff = $currentTime - $messageTime;
    
    // Time intervals in seconds
    $minute = 60;
    $hour = 60 * $minute;
    $day = 24 * $hour;
    
    if ($timeDiff < $minute) {
        $timing = floor($timeDiff) . ' sec ago';
    } elseif ($timeDiff < $hour) {
        $timing = floor($timeDiff / $minute) . ' min ago';
    } elseif ($timeDiff < $day) {
        $timing = floor($timeDiff / $hour) . ' hour ago';
    } else {
        $timing = floor($timeDiff / $day) . ' day ago';
    }
    
    return $timing;
}

function getOfferlimit($timestamp) {
    $currentTime = time();
    $messageTime = strtotime($timestamp);
    $timeDiff = $messageTime - $currentTime;
    
    // Time intervals in seconds
    $minute = 60;
    $hour = 60 * $minute;
    $day = 24 * $hour;
    
    if ($timeDiff < $minute) {
        $timing = floor($timeDiff) . ' sec left';
    } elseif ($timeDiff < $hour) {
        $timing = floor($timeDiff / $minute) . ' min left';
    } elseif ($timeDiff < $day) {
        $timing = floor($timeDiff / $hour) . ' hour left';
    } else {
        $timing = floor($timeDiff / $day) . ' day left';
    }
    
    return $timing;
}

function escapeString($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// Example usage

