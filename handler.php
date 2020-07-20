<?php

// Jika ada data SMS masuk dari server Envaya

if( $action->type == EnvayaSMS::ACTION_INCOMING ) {

    $from = $action->from;

    $message = $action->message;

    

    // Jika mendapatkan SMS dengan pesan "halo"

    if( $message == 'halo' ) {

        

        // Memasukkan data balasan ke database, agar dapat dibaca oleh server Envaya SMS

        $msg = 'Halo juga bro!'; // Pesan balasan nya

        

        $sms_id = acak_angka( 3 );

        $db->query( "INSERT INTO sms_outgoing (sms_id, target, msg, status, error, date) VALUES ('$sms_id', '$from', '$msg', 'pending', '', '$date')" );

        

    }

}
