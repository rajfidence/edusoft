<?php  //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('create_pdf')) {

    function create_pdf($html_data, $file_name = "",$header) {
        if ($file_name == "") {
            $file_name = '' . date('dMY');
        }
        require 'mpdf/mpdf.php';
        $mypdf = new mPDF('utf-8','A4','','',22,22,50,0,0,5,'P');
		//$mpdf->allow_html_optional_endtags = true;
		$mypdf->SetAutoPageBreak(false);
		//$mypdf->SetDisplayMode('fullpage');
		//$mypdf->useOddEven = 0;
		$footer = '<span style=" text-align:center; height:63px; background-color:#fff; color:#0000">&copy; Toabh Management</span></body>
</html>';
		$mypdf->SetHTMLHeader($header);
		$mypdf->SetHTMLFooter($footer);
		$mypdf->WriteHTML($html_data,2);
		
        
		
        $mypdf->Output($file_name, 'D');
    }
	
	
	function email_pdf($html_data, $file_name = "",$header,$dest) {
        if ($file_name == "") {
            $file_name = '' . date('dMY');
        }
        require 'mpdf/mpdf.php';
        $mypdf = new mPDF('utf-8','A4','','',22,22,50,0,0,5,'P');
		//$mypdf->SetDisplayMode('fullpage','two');
		$footer = '<span style=" text-align:center; height:63px; background-color:#fff; color:#0000">&copy; Toabh Management</span></body>
</html>';
		$mypdf->SetHTMLHeader($header);
		$mypdf->SetHTMLFooter($footer);
        $mypdf->WriteHTML($html_data,2);
		
        $content = $mypdf->Output($file_name.'.pdf', 'F');
		
		
    }
	
	
	
	function create_pdf_with_tcpdf($html_data, $file_name = "",$header){
	
		require_once('tcpdf_include.php');

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 021');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
		
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('helvetica', '', 9);
		
		// add a page
		$pdf->AddPage();

		// output the HTML content
		$pdf->writeHTML($html_data, true, 0, true, 0);
		
		// reset pointer to the last page
		$pdf->lastPage();
		
		// ---------------------------------------------------------
		
		//Close and output PDF document
		$pdf->Output('example_021.pdf', 'D');
		
		//============================================================+
		// END OF FILE
		//============================================================+
		
		
	}
	
	

}

?>