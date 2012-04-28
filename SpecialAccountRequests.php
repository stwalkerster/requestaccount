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
		$this->getOutput()->setPageTitle( wfMessage( 'requestaccount-zoom-header', $request ) );
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

		$dbr = wfGetDb( DB_SLAVE );

		$res = $dbr->select(
			'requestaccount_request', // table name
			array( // table fields
				'rar_id',
				'rar_name',
				'rar_email',
				'rar_comment',
				'rar_ip',
				'rar_reserved',
			),
			array( // conditions
				'rar_status' => $type,
			)
		);

		$hasOutput = false;
		$output = Xml::element( 'ol', array(), null /* open tag */ );

		foreach( $res as $row ) {
			$hasOutput = true;

			if( $row->rar_reserved == 0 ) {
				$reserved = wfMessage( 'requestaccount-notreserved' );
			} else {
				$reserved = wfMessage( 'requestaccount-reserved', User::newFromId( $rar_reserved )->getName() );
			}

			$request = htmlspecialchars( $row->rar_name );

			$id = htmlspecialchars( $row->rar_id );

			$links = array(
				Linker::link( Title::makeTitle( NS_SPECIAL, "AccountRequests/$id" ), wfMessage( 'requestaccount-requestlist-zoom' ) ),
				$reserved
			);

			$request .= ' ' . wfMessage( 'parentheses', $this->getLanguage()->pipeList( $links ) )->plain();

			$output .= Xml::element( 'li', array(), null );
			$output .= $request;
			$output .= Xml::closeElement( 'li ');

		}

		$output .= Xml::closeElement( 'ol' );

		if( $hasOutput ) {
			$wgOut->addHtml( $output );
		} else {
	                $wgOut->addHtml( wfMessage( 'requestaccount-requests-empty' )->parse() );
		}
	}

}

