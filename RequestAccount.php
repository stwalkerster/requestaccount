<?php

if(!defined('MEDIAWIKI')) {
	echo("This file is an extension to the MediaWiki software and cannot be used standalone\n");
	die( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'Request Account',
	'descriptionmsg' => 'requestaccount-desc',
	'author' => array('Simon Walker'),
	'url' => 'https://stwalkerster.co.uk/projects/requestaccount',
);

$directory = dirname( __FILE__ );

// messages

$wgExtensionMessagesFiles['RequestAccount'] = "$directory/RequestAccount.i18n.php";

// Autoloader

$wgAutoloadClasses['RequestAccountHooks'] = "$directory/RequestAccount.hooks.php";

// special pages

// rights

// Hooks

$wgHooks['LoadExtensionSchemaUpdates'][] = 'RequestAccountHooks::schemaUpdates';
