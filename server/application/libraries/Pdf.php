<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
require_once dirname(__FILE__) . '/fpdi/fpdi.php';
 
class Pdf extends FPDI
{
	public $_tplIdx;
	public $size;
    function __construct()
    {
        parent::__construct();
		ob_start();
		ob_clean();
    }
	function page($pageName,$pageNo,$x=0,$y=0,$width=210,$height=290){
		//if (is_null($this->_tplIdx)) {
		$this->setSourceFile(FCPATH."themes/cleanzone1_3/images/files/".$pageName.".pdf");
		$this->_tplIdx = $this->importPage($pageNo);
		//}
		$this->SetCreator(PDF_CREATOR);
		$this->setPrintHeader(false);
		$this->setPrintFooter(false);
		//$this->SetFont('freesans', 'B', 20);
        //$this->SetTextColor(0);
        //$this->SetXY(PDF_MARGIN_LEFT,0);
        //$this->Cell(0, $size['h'], 'TCPDF and FPDI');
		}
	
}
?>