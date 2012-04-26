<?php

$messages = array();

$messages['en'] = array(
	// Extension description message
	'requestaccount-desc' => 'Allows users to request an account be created for them.',

	// user rights
	'action-requestaccount-view' => 'view account requests',
	'right-requestaccount-view' => 'View account requests',

	// special page descriptions
	'accountrequests' => 'Manage account requests',
	'requestaccount' => 'Request an account',

	// account requests content
	'requestaccount-requests-header' => 'This page lists all the outstanding requests for accounts.',
	'requestaccount-requests-open' => 'Open requests',
	'requestaccount-requests-onhold' => 'On hold',
	'requestaccount-requests-checkuser' => 'Awaiting CheckUser input',

	'requestaccount-requests-empty' => ":''No requests at this time''",


	// account request form content
	'requestaccount-requestform-header' => 'request form header',
	'requestaccount-requestform-footer' => 'request form footer',
	'requestaccount-legend' => 'form legend',
	'requestaccount-text' => 'form text',

	'requestaccount-requestform-name' => 'Desired Username:',
	'requestaccount-requestform-email' => 'Your E-mail Address:',
	'requestaccount-requestform-emailconfirm' => 'Confirm your E-mail Address:',
	'requestaccount-requestform-comment' => 'Comments (optional):',

	'requestaccount-requestform-name-help' => 'Case sensitive, first letter is always capitalized, you do not need to use all uppercase. Note that this need not be your real name. Please make sure you don\'t leave any trailing spaces or underscores on your requested username.',
	'requestaccount-requestform-email-help' => 'We need this to send you your password. Without it, you will not receive your password, and will be unable to log in to your account.',
	'requestaccount-requestform-emailconfirm-help' => '',
	'requestaccount-requestform-comment-help' => 'Please do NOT ask for a specific password. One will be randomly created for you.',

	// confirmation mail
	'requestaccount-confirmationmailsent' => "Many thanks for your interest in joining Wikipedia.\n\nYour request for an account will be received by a team of volunteers after you confirm your E-Mail address (check your inbox or spam folder). We wish you all the best and hope you enjoy your time on Wikipedia.\n\nRegards,\n\nThe Wikipedia Account Creation Team",
	'requestaccount-confirmationmailsent-header' => 'E-Mail Confirmation required',


	'requestaccount-requestsubmitted' => "Many thanks for your interest in joining Wikipedia.\n\nYour request for an account has been received, and will be considered by a team of volunteers, usually within 24 hours.\n\nIf your account is created, you will receive an automated e-mail from wiki@wikimedia.org with your login credentials. You can use these to log in for the first time, where you will then be prompted to chose a new password.\n\nWhile you wait, you may find it useful to read through the 'getting started' section of our help pages. Of particular interest may be the Introduction to Wikipedia, which has some information to help you get up to speed with the way things work on Wikipedia.\n\nWe wish you all the best and hope you enjoy your time on Wikipedia.\n\nRegards, \n\nThe English Wikipedia Account Creation Team",
	'requestaccount-requestsubmitted-header' => 'Request submitted!',
);
