<?php

return array(

    'exportTypes' => [
        'xls', 'xlsx', 'pdf'
    ],
    
    'contragents'      => [
        'allowed-columns' => [
            'contragentname' => 'name', 
            'contragentorganizationtype.type' => 'name',
            'contragentEIK' => 'contragent-EIK', 
            'contragentcontactaddress' => 'contragent-contact-address',
            'contragenttype.type' => 'contragent-type'
        ],
        
    ]
);
