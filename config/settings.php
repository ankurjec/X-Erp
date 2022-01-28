<?php
   
return [
    'app_name' => env('APP_NAME'),
    'project_id' => 1,
    'slack_hook' => env('SLACK_HOOK'),
    'mode_of_payments' => [        
        'Bank Transfer SBI',
        'Bank Transfer ICICI',
        'Cash',
        'bank_transfer'
    ]
]
  
?>