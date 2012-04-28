<?php

class SpecialRequestAccount extends FormSpecialPage {
        public function __construct() {
                parent::__construct( 'RequestAccount' );
        }

	protected function preText() {
		return wfMessage( 'requestaccount-requestform-header' )->parse();
        }
	protected function postText() {
		return wfMessage( 'requestaccount-requestform-footer' )->parse();
        }

	protected function getFormFields() {
		return array (
			'RequestName' => array(
				'class' => 'HTMLTextField',
				'label-message' => 'requestaccount-requestform-name',
				'help-message' => 'requestaccount-requestform-name-help',
				'required' => 'true',
			),
			'RequestEmail' => array(
				'class' => 'HTMLTextField',
				'label-message' => 'requestaccount-requestform-email',
				'help-message' => 'requestaccount-requestform-email-help',
				'required' => 'true',
			),
			'RequestEmailConfirm' => array(
				'class' => 'HTMLTextField',
				'label-message' => 'requestaccount-requestform-emailconfirm',
				'help-message' => 'requestaccount-requestform-emailconfirm-help',
				'required' => 'true',
			),
			'RequestComment' => array(
				'class' => 'HTMLTextAreaField',
				'label-message' => 'requestaccount-requestform-comment',
				'help-message' => 'requestaccount-requestform-comment-help',
				'rows' => 4,
				'cols' => 40,
			),
		);
	}

	public function onSubmit( array $data ) {
		global $wgRequest;

		global $wgOut;

		$dbw = wfGetDb( DB_MASTER );

		if( $data[ 'RequestEmail' ] != $data[ 'RequestEmailConfirm' ] ) {
			return array('requestaccount-error-emailnomatch');
		}


		$dbw->insert(
			'requestaccount_request',
			array(
				'rar_name' => $data[ 'RequestName' ],
				'rar_email' => $data[ 'RequestEmail' ],
				'rar_email_authenticated' => '',
				'rar_email_token' => '',
				'rar_ip' => wfGetIP(),
				'rar_comment' => $data[ 'RequestComment' ],
				'rar_status' => 'Open',
				'rar_date' => '',
				'rar_reserved' => '0',
				'rar_useragent' => $wgRequest->getHeader( 'User-Agent' ),
				'rar_xff' => $wgRequest->getHeader( 'X-Forwarded-For' ),

			)
		);

		return true;
	}

	public function onSuccess() {
		$this->getOutput()->setPageTitle( wfMessage( 'requestaccount-confirmationmailsent-header' ) );
		$this->getOutput()->addWikiMsg( 'requestaccount-confirmationmailsent' );
		$this->getOutput()->returnToMain();
	}
}
