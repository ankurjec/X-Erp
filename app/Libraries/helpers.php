<?php

/*if(!function_exists('get_project_id')) {
    function get_project_id() {
        return 1;
    }
}*/

function get_project_id() {
    return 1;
}

function get_gst_state_list() {
    $statelistarr = [
        1 => "JAMMU AND KASHMIR",
        2 => "HIMACHAL PRADESH",
        3 => "PUNJAB",
        4 => "CHANDIGARH",
        5 => "UTTARAKHAND",
        6 => "HARYANA",
        7 => "DELHI",
        8 => "RAJASTHAN",
        9 => "UTTAR PRADESH",
        10 => "BIHAR",
        11 => "SIKKIM",
        12 => "ARUNACHAL PRADESH",
        13 => "NAGALAND",
        14 => "MANIPUR",
        15 => "MIZORAM",
        16 => "TRIPURA",
        17 => "MEGHLAYA",
        18 => "ASSAM",
        19 => "WEST BENGAL",
        20 => "JHARKHAND",
        21 => "ODISHA",
        22 => "CHATTISGARH",
        23 => "MADHYA PRADESH",
        24 => "GUJARAT",
        25 => "DAMAN AND DIU",
        26 => "DADRA AND NAGAR HAVELI",
        27 => "MAHARASHTRA",
        28 => "ANDHRA PRADESH (BEFORE DIVISION)",
        29 => "KARNATAKA",
        30 => "GOA",
        31 => "LAKSHWADEEP",
        32 => "KERALA",
        33 => "TAMIL NADU",
        34 => "PUDUCHERRY",
        35 => "ANDAMAN AND NICOBAR ISLANDS",
        36 => "TELANGANA",
        37 => "ANDHRA PRADESH (NEW)"
        ];
    
    return $statelistarr;
}

function moneyFormatIndia($num){
    $negative = false;
    if($num<0)
    {
        $negative = true;
        $num = abs($num);
    }
	$num=number_format((float)$num, 2, '.', '');
	$str=explode('.',$num,2);
	$num=$str[0];
    $explrestunits = "" ;
    if(strlen($num)>3){
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++){
            // creates each of the 2's group and adds a comma to the end
            if($i==0)
            {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            }else{
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }

    if($negative)
    {
        return '(-) '.$thecash.'.'.$str[1];
    }
    return $thecash.'.'.$str[1]; // writes the final format where $currency is the currency symbol.
}

function moneyFormatIndia_int($num){
	$num=number_format((float)$num, 2, '.', '');
	$str=explode('.',$num,2);
	$num=$str[0];
    $explrestunits = "" ;
    if(strlen($num)>3){
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++){
            // creates each of the 2's group and adds a comma to the end
            if($i==0)
            {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            }else{
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}