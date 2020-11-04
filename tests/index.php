<?php

use ProcessWith\ProcessWith;

require '../vendor/autoload.php';
require 'config.php';

// $amount = '50000';
// $email  = 'ikwuje24@gmail.com';

// $processwith = new ProcessWith('paystack');
// $processwith->setSecretKey( PSTK_SECRET_KEY );

// $transaction = $processwith->transaction();
// $transaction->initialize([
//     'amount'    => (float) $amount,
//     'email'     => $email
// ]);

// if( $transaction->status() ) {
//     file_put_contents('ref.txt', $transaction->getReference());
//     $transaction->checkout(); // redirect to the gateway checkout page
// }
// else {
//     // beautiful error message display
//     die( $transaction->statusMessage() );
// }


$processwith = new ProcessWith('flutterwave');
$processwith->setSecretKey( RAVE_SECRET_KEY );

$transaction = $processwith->transaction();

$transaction->initialize([
    'amount'          => (float) 1000,
    'redirect_url'    => 'https://localhost:6050/tests/verify.php',
    'customer'        => [ 'email' => 'afuwapesunday12@gmail.com', 'name' => 'sunny' ],
    'meta'            => [ 'consumer_id' => 23, 'consumer_mac' => '92a3-912ba-1192a' ],
]); 

if( $transaction->status() ) {
    file_put_contents('ref.txt', $transaction->getReference());
    $transaction->checkout(); // redirect to the gateway checkout page
}
else {
    // beautiful error message display
    die( $transaction->statusMessage() );
}