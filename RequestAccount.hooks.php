<?php

class RequestAccountHooks {

	public static function schemaUpdates( DatabaseUpdater $updater ) {
		$updater->addExtensionUpdate( array(
			'addTable',
			'requestaccount_request', // table name
			dirname( __FILE__ ) . '/schema/request.sql',
			true // patch file path is absolute
		));

		return true;
	}
}
