<?php
class Export {
		
	public static 
		$data
		, $colunasExcel
		, $outputType = 'save'
		, $PHPExcel // save, download
		, $MPDF
		, $columns
		, $columnsModel
		, $columnsWidth = array()
		, $fields
		, $prefix_name = 'relatorio_'
		, $source
		, $defaultColumnWidth = 100;

	private static
		/**
		 * @var string csv,xls,pdf
		 */
		$_toFormat = 'csv'
		/**
		 * @var string url,data 
		 */
		, $_fromFormat = 'url';	
	
	public static function setPrefixName( $prefix_ ){
		self::$prefix_name = $prefix_;
	}
	
	public static function setToFormat( $toFormat_ ) {
		self::$_toFormat = $toFormat_;
	}
	
	public static function setFromFormat( $fromFormat_ ) {
		self::$_fromFormat = $fromFormat_;
	}
	
	public static function setData( $data ) {
		
		self::$data = $data;
		
		if( self::$_fromFormat == 'data' ) {
			self::getColumns();
			self::formatData();
		}
		
	}
	
	public static function formatData() {
		
		$new_data = array();
		
		/**
		 * TODO: Procurar uma nova forma de verificar os campos
		 */
		foreach( self::$data as $k => &$linha ) {
			
			foreach( self::$fields as $field ) { 
				
				if( isset( $linha[ $field ] ) ) {
					
					if( isset( self::$columnsModel[$field] ) ) {						
						$new_data[ $k ][ $field ] = Helpers::formatter( $linha[ $field ] , self::$columnsModel[$field] );
					} else {
						$new_data[ $k ][ $field ] = $linha[ $field ];
					}
					
				} else {
					$new_data[ $k ][ $field ] = '';
				}
			}
		}		
		self::$data = $new_data;
	}
	
	public static function setColumns( $columns_ = null ) { 
		
		global $lng;
		
		self::$columns = array();
		
		if( isset( $columns_ ) && !empty( $columns_ ) ) {
			foreach ( $columns_ as $k => &$model ) {
				
				if( !isset($model['export']) or $model['export'] == true ) {			
					self::$columns[] = isset( $lng[$k] )  ? $lng[$k] : $model['name'] ;
					self::$fields[] = $model['name'];
					
					$colWidth = self::$defaultColumnWidth;
					if( isset($model['width']) && (int)$model['width'] > 0 )
						$colWidth = (int)$model['width'];
						
					self::$columnsWidth[] = $colWidth;
					// o nome do campo vira �ndice
					self::$columnsModel[$model['name']] = $model;
				}
			}
		}
	}
	
	private static function getColumns(){
		
		global $lng;
		
		if ( !isset( self::$columns ) ) {
			self::$columns = self::$fields = array_keys( current( self::$data) );
			self::$columnsWidth = array_fill( 0, count(self::$columns), self::$defaultColumnWidth );
		}
		
	}
	private static function setSource( $source_ ) { 
		self::$source = $source_ ;
	}
	public static function convertTo( $source_, $format_ = 'csv', $from_ = 'html' ) {
		
		self::setToFormat( strtolower( $format_ ) );
		self::setFromFormat( $from_ );
		self::setSource( $source_ );
		
		if( $from_ == 'html' ) {
					
			self::convertHTML();
		
		} else if( $from_ == 'data' ) {

			self::convertData();
		
		}
				
	} 
	private static function convertHTML() {

		if( self::$source ) {
			
			self::setData( self::$source );

			switch ( self::$_toFormat ) {
				case 'pdf' :
					self::convertHTMLToPDF();	
					break;
				case 'xls' :
					self::convertHTMLToXLS();
					break;	
			}
			
		}
		
		return false;
		
	}
	private static function convertData() {	
		
		if( is_array(self::$source) ) {
			
			self::setData( self::$source );
			
			switch ( self::$_toFormat ) {
				case 'pdf' :
					self::convertDataToPDF();	
					break;
				case 'csv' :
					self::convertDataToCSV();	
					break;
				case 'xls' :
					self::convertDataToXLS();
					break;	
			}
			
		}
	
	}
	
	private static function convertDataToPDF(){
		
		$pdf = new FPDFTable();

		// Header
		$pdf->setColumns( self::$columns );
		$pdf->setColumnsWidth( self::$columnsWidth );	
		$pdf->setLogo('http://localhost/sitebhstouche/_img/logo.jpg');
		$pdf->setBody( self::$data );
		
		$name = self::$prefix_name.time().'.pdf';
		
		$pdf->Output($name, 'I');

		unset($pdf);
		
		exit;
	}
	private static function convertDataToCSV() {
			
		$objPHPExcel = self::convertDataToExcel();
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		$objWriter->setDelimiter( ';' );
		
		$name = self::$prefix_name.time().'.csv';
		
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Transfer-Encoding: Binary");
		header('Content-Disposition: attachment;filename="'.$name.'"');		
		header('Cache-Control: max-age=0');

		$objWriter->save('php://output');
		
		unset($objWriter);
		exit;
	}
	
	private static function convertDataToXLS() {	
		
		$objPHPExcel = self::convertDataToExcel();
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		
		$name = self::$prefix_name.time().'.xls';		
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');		
		header('Content-Disposition: attachment;filename="'.$name.'"');		
		header('Cache-Control: max-age=0');
		
		$objWriter->save('php://output');
		
		unset($objWriter);
		exit;
		
	}
	
	private static function convertDataToExcel(){		
		
		self::$colunasExcel =  range('A', 'Z');	
		
		// Criar um novo objecto PHPExcel
		if( !isset(self::$PHPExcel) ) {
			self::$PHPExcel = new PHPExcel();
		}
		
		self::$PHPExcel->getProperties()->setCreator("sitebhstouche")
                ->setLastModifiedBy("Modificado")
                ->setTitle("O T�tulo")
                ->setSubject("O Assunto")
                ->setDescription("A Descri��o")
                ->setKeywords("As Palavras Chave")
                ->setCategory("A Categoria");      	
	
		$cell = 0;	
		$line = 1;
			
		foreach( self::$columns as $k => $title ) {
									
			self::$PHPExcel->setActiveSheetIndex(0)
				->setCellValue(self::$colunasExcel[$cell].$line, $title);

			self::$PHPExcel->getActiveSheet(0)->getColumnDimension(self::$colunasExcel[$cell])->setAutoSize(true);	
			
			$cell++;
		}
		
		$line = 2;		
		foreach( self::$data as $linha ) {
			
			$cell = 0;						
			foreach( $linha as $value ) {
				self::$PHPExcel->setActiveSheetIndex(0)->setCellValue(self::$colunasExcel[$cell].$line, $value);
				$cell++;
			}	
			$line ++;
		}
		
		return self::$PHPExcel;
	}
	
	private static function convertHTMLToPDF(){
				
		$mpdf = new mPDF('utf-8', 'A4-L');
		$mpdf->CSSselectMedia = 'export';
		$mpdf->WriteHTML( self::$data );
		
		$name = self::$prefix_name.time().'.pdf';
		
		$mpdf->Output($name , 'I');
		
		unset($mpdf);
		exit;
	
	}
	
	private static function convertHTMLToXLS(){
		
		$name = self::$prefix_name.time().'.xls';
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');		
		header('Content-Disposition: attachment;filename="'.$name.'"');		
		header('Cache-Control: max-age=0');
		header("Content-Type: application/force-download");
		
		echo self::$data;
		
		exit;
	}
	
}