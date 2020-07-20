<?php

/**

  # File GATEWAY UNTUK MENANGGAPI REQUEST DARI SERVER ENVAYA

**/

require 'config.php';

$request = EnvayaSMS::get_request();

header( "Content-Type: {$request->get_response_type()}" );

if ( !$request->is_validated( $PASSWORD ) ) { 

    echo $request->render_error_response( "Password envaya nya salah cuk!" );

    return;

}

$action = $request->get_action();

if( $action->type == EnvayaSMS::ACTION_INCOMING ) {
  // Jika ada data SMS masuk, panggil file 'handler.php' untuk menanggapi SMS yang masuk
	include 'handler.php';	

} else if( $action->type == EnvayaSMS::ACTION_SEND_STATUS ) {

    $sms_id = $action->id;

    $sms_error = $action->error;

    $sms_status = strtolower( $action->status );

    // Update data SMS yang terdapat di database

    $db->query( "UPDATE sms_outgoing SET status = '$sms_status', error = '$sms_error' WHERE sms_id = '$sms_id'" );

    

} else {

    // Mengecek apakah terdapat data SMS outgoing yang masih berstatus 'pending'

    $cek_sms_out = $db->query( "SELECT * FROM sms_outgoing WHERE status = 'pending' ORDER BY id ASC" );

    if( $cek_sms_out->num_rows > 0 ) {

        // Jika terdapat, maka SMS tersebut akan di kirim ke server envaya SMS 

        

        $data_sms_out = $cek_sms_out->fetch_array(MYSQLI_ASSOC);

	$sms_id = $data_sms_out['sms_id'];

	        

	$sms_out = new EnvayaSMS_OutgoingMessage();

	$sms_out->id = $sms_id;

	$sms_out->to = $data_sms_out['target'];

	$sms_out->message = $data_sms_out['msg'];

	$request_sms_out[] = $sms_out;

	$exe_sms_out = array();

	$exe_sms_out[] = new EnvayaSMS_Event_Send( $request_sms_out );

        // Update status SMS ke database

	$u = $db->query(  "UPDATE sms_outgoing SET status = 'proccess' WHERE sms_id = '$sms_id'" );

	if( $u == TRUE ) {

	    echo $request->render_response( $exe_sms_out );

	}

    }

}
