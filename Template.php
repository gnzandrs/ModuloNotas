<?php

/***************************************************************************
 * 
 * Clase para el manejo de las plantillas 
 * 
 **************************************************************************/
 
class Template{
	var $tpl_file, $htmlTemplate;
	var $htmlText;
	var $fileReaded;
	var $PATH = './temas/src/plantillas/';
	var $EXT = '.tpl';
	
	// Constructor de la clase plantilla
	function Template(){
	}
	
	// Setea o selecciona el path o ruta de la plantilla a utilizar
	function setTemplate( $templateFile ){
		$this->htmlText="";	
		$this->tpl_file =  $this->PATH . $templateFile . $this->EXT ;
		$this->fileReaded = $this->fileData = @fopen($this->tpl_file, 'r');
		if (!$this->fileReaded) {
				return false;
				
		} else{
			$this->htmlTemplate = fread($this->fileData, filesize($this->tpl_file));
			$this->htmlTemplate = str_replace ("'", "\'", $this->htmlTemplate);
			fclose($this->fileData);
		}
		return true;
	}
	
	// Setea o las variables a usar por la plantillas
	function setVars($vars){
		if ( $this->fileReaded ) {
			$this->vars = $vars;
			$this->htmlText = preg_replace('#\{([a-z0-9\-_]*?)\}#is', "' . $\\1 . '", $this->htmlTemplate);
			reset ($this->vars);
			while (list($key, $val) = each($this->vars)) {
					$$key = $val;
			}
			eval("\$this->htmlText = '$this->htmlText';");
			reset ($this->vars);
			while (list($key, $val) = each($this->vars)) {
					unset($$key);
			}
			$this->htmlText = str_replace ("\'", "'", $this->htmlText);
			return true;
		}else{
			//Error, you must set a template file
			return false;
		}
		
	}
	
	
	function show(){
		if ( $this->fileReaded ) {
		    return ($this->htmlText!="")?$this->htmlText:$this->htmlTemplate;
		}else{
			//Error, you must set a template file
			return "[ERROR]";
		}
	}
	
	function setPath($newPath = './complementos/plantillas/') {
		$this->PATH = $newPath;
	}
}

?>