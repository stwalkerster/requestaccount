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
		$wgOut->addHtml( Xml::element( 'h2', array(), wfMessage( 'requestaccount-requests-open' )->parse() ) );

		$this->listRequests( "Open" );

		$wgOut->addHtml( Xml::element( 'h2', array(), wfMessage( 'requestaccount-requests-onhold' )->parse() ) );

		$this->listRequests( "On Hold" );

		$wgOut->addHtml( Xml::element( 'h2', array(), wfMessage( 'requestaccount-requests-checkuser' )->parse() ) );

		$this->listRequests( "Checkuser" );
	}

	private function listRequests( $type="Open" ) {
		global $wgOut;
                $wgOut->addHtml( wfMessage( 'requestaccount-requests-empty' )->parse() );
	}

}

