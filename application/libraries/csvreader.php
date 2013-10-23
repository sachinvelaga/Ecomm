<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class CSVReader {

		var $fields;            /** columns names retrieved after parsing */ 
		var $separator = ';';    /** separator used to explode each line */
		var $enclosure = '"';    /** enclosure used to decorate each field */
		//     var $j = 0;
		var $max_row_size = 4096;    /** maximum row size to be used for decoding */

		/**
		* Parse a file containing CSV formatted data.
		*
		* @access    public
		* @param    string
		* @param    boolean
		* @return    array
		*/
		public	function parse_file($p_Filepath, $p_NamedFields = true) {
			//    $j = 0;
			$prod_row = array();
			$content = false;
			$file = fopen($p_Filepath, 'r');
			if($p_NamedFields) {
				$this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
				$fields = explode(',',$this->fields[0]);
			}
			while( ($row = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure)) != false ) {            
				if( $row[0] != null ) { 
					$prod_row = explode(',',$row[0]);
					if( !$content ) {
						$content = array();
					}
					if( $p_NamedFields ) {
						$items = array();

						foreach( $fields as $id => $field ) {
							//	debugbreak();
							if(isset($prod_row[$id]))
							{
								$items[$field] = $prod_row[$id];    
							}else{
								//	 echo $j.'<br/>';
								$items[$field] = -1;
							}
						}
						$content[] = $items;
					} 
				}
				//  $j++;
				//   echo $j;
			}
			fclose($file);
			//debugbreak();
			return $content;
		}
	}
?>