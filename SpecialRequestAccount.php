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
		return true;
	}

	public function onSuccess() {
		$this->getOutput()->setPageTitle( wfMessage( 'requestaccount-confirmationmailsent-header' ) );
		$this->getOutput()->addWikiMsg( 'requestaccount-confirmationmailsent' );
		$this->getOutput()->returnToMain();
	}
}
