<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
class export{

function to_excel($array, $filename, $header='') {
    header('Content-Disposition: attachment; filename='.$filename.'.xls');
    header('Content-type: application/force-download');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: public');
    print "\xEF\xBB\xBF"; // UTF-8 BOM
	$h=$header;
    if($header==''){
	$h = array();
	foreach($array as $row){
        foreach($row as $key=>$val){
            if(!in_array($key, $h)){
                $h[] = $key;   
            }
        }
     }
	}
    echo '<table border="1"><tr>';
    foreach($h as $key) {
        $key = ucwords($key);
        echo '<th>'.$key.'</th>';
    }
    echo '</tr>';
	
	foreach($array as $row){
        echo '<tr>';
        foreach($row as $val)
            $this->writeRow($val);   
    }
    echo '</tr>';
    echo '</table>';
	break;
    
}

function writeRow($val) {
    echo '<td>'.$val.'</td>';              
}

}
?>