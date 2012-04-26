<?php

class SpecialAccountRequests extends SpecialPage {
	public function __construct() {
		parent::__construct( 'AccountRequests', 'requestaccount-view' );
	}

	public function execute( $subpage ) {
		global $wgRequest, $wgOut, $wgUser;

	        if ( !$this->userCanExecute($wgUser) ) {
        	        $this->displayRestrictionError();
	                return;
	        }

		$this->setHeaders();

		if($subpage === null) {
			$this->showListPage();
		} else {
			$this->showZoomPage( $subpage );
		}
	}

	private function showZoomPage( $request ) {

	}

	private function showListPage() {
		global $wgOut;

		$wgOut->addHtml( wfMessage( 'requestaccount-requests-header' )->parse() );
	}

}
