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