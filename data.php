<?php
    $start = $_GET['start'];
    $end = $_GET['end'];
    
    function getDatesFromRange($start, $end, $format = 'Y-m') {
      
        // Declare an empty array
        $array = array();
          
        // Variable that store the date interval
        // of period 1 day
        $interval = DateInterval::createFromDateString('1 month');
      
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
      
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
      
        // Use loop to store date into array
        foreach($period as $date) {                 
            $array[] = array('x' => $date->format("Y-m"),
                             'y' => rand(10, 100)); 
        }
      
        // Return the array elements
        return $array;
    }
      
    // Function call with passing the start date and end date
    $Data = getDatesFromRange($start, $end);
    echo json_encode($Data);
?>