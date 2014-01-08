<?php


class Trail {

	var $path = array ();

	function Trail( $includeHome = true, $homeLabel = 'Home', $homeLink = '/' ) {

		if( $includeHome )
			$this->addStep ( $homeLabel, $homeLink );

	}

	function addStep( $title, $link = '' ) {

		$item = array ('title' => $title );

		if (strlen ( $link ) > 0)
			$item ['link'] = $link;

		$this->path [] = $item;

	}

}

?>