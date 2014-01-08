<?php
class FPDFTable extends FPDF
{	
	private
		$columns,
		$columnsWidth,
		$isFirsPage = true,
		$logo;
		
	public function setColumns( $columns ) {
		$this->columns = $columns;
	}
	public function setColumnsWidth( $columnsWidth ) {
		$this->columnsWidth = $columnsWidth;
	}

	public function setLogo($url){
		$this->logo = $url;
	}
		
	public function Header() {
		
		if( $this->isFirsPage ) {
			// coloca a logo na primeira página
			if( $this->logo ) {
				list( $width, $height ) = getimagesize( $this->logo );
				$this->Image( $this->logo, 10, 10, 0, 0 );
				$imgHmm = ($height*0.26);	
				$imgWmm = ($width*0.26);											
				$this->Ln( $imgHmm+10 );
				
			}
			$this->isFirsPage = false;
		}
		 
		// fonte das colunas
		$this->SetFont('Arial', 'B', 7 );
			
	  	$c = 0;
	    foreach( $this->columns as $col ) {
	    	// conversão de px para mm
	    	$w = ($this->columnsWidth[$c]*0.26);
	    	// cria a célula	    	
	        $this->Cell($w, 7, $col, 1);
	        $c++;
	    }
	    
	    $this->ln(); 
	    // fonte do conteúdo
	    $this->SetFont('Arial', '', 7 );
	}
	public function setBody( $data ){
				
		 $orientation = 'P';
	    
	    if( array_sum( $this->columnsWidth ) > 725 ) { 
	    	$orientation = 'L';
	    }
		
		$this->AddPage( $orientation );
		
	    foreach( $data as $row ) {
	    	$c = 0;
	        foreach( $row as $col ) {
	            $this->Cell( ($this->columnsWidth[$c]*0.26), 6, $col, 1 );
	        	$c++;
	        }    
	        $this->Ln();
	    }
	}
}