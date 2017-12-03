<?php
header("Content-type: text/html; charset=GBK");
error_reporting(0);
include 'lib/mysql.class.php';
include 'lib/PHPExcel.class.php';
include 'conn.php';
function read_xls($file_name,$_section,$_day) {
    global $M;
    $excelReader = PHPExcel_IOFactory::createReader('Excel5');
    try {
        $excelLoad = $excelReader->load($file_name,$encode='GBK');
    }catch(Exception $e){
        exit($e);
    }
    $arr = array(1 => 'C', 2 => 'D', 3 => 'E', 4 => 'F', 5 => 'G', 6 => 'H', 7 => 'I');
    $week = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
    for($j=5; $j<=17; $j+=4) {
        for($i=1; $i<=7; $i++) {
            $getcell = $excelLoad->getActiveSheet()->getCell($arr[$i].$j)->getValue();
            if(!$getcell) {
                $getcell = ',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,';
            } else {
                if(strpos($getcell,"单")){
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        if($k%2!==0) {  
                            $getcell[] .= $k;
                        }
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }elseif (strpos($getcell,"双")) {
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        if($k%2==0) {  
                            $getcell[] .= $k;
                        }
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }else{
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        $getcell[] .= $k;
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }
            }
            $lists_kb[] = $getcell;
        }
    }
    for($j=22; $j<=34; $j+=4) {
        for($i=1; $i<=7; $i++) {
            $getcell = $excelLoad->getActiveSheet()->getCell($arr[$i].$j)->getValue();
            if(!$getcell) {
                $getcell = ',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,';
            } else {
                if(strpos($getcell,"单")){
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        if($k%2!==0) {  
                            $getcell[] .= $k;
                        }
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }elseif (strpos($getcell,"双")) {
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        if($k%2==0) {  
                            $getcell[] .= $k;
                        }
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }else{
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        $getcell[] .= $k;
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }
            }
            $lists_kb[] = $getcell;
        }
    }
    for($j=39; $j<=51; $j+=4) {
        for($i=1; $i<=7; $i++) {
            $getcell = $excelLoad->getActiveSheet()->getCell($arr[$i].$j)->getValue();
            if(!$getcell) {
                $getcell = ',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,';
            } else {
                if(strpos($getcell,"单")){
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        if($k%2!==0) {  
                            $getcell[] .= $k;
                        }
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }elseif (strpos($getcell,"双")) {
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        if($k%2==0) {  
                            $getcell[] .= $k;
                        }
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }else{
                    preg_match_all('/\d+/', $getcell, $matches);
                    $getcell = '';
                    for($k=$matches[0][0]; $k<=$matches[0][1]; $k++) {
                        $getcell[] .= $k;
                    }
                    $diff = array_diff($week, $getcell);
                    $getcell = '';
                    foreach ($diff as $key => $value) {
                        $getcell .= ','.$value;
                    }
                    $getcell .= ',';
                }
            }
            $lists_kb[] = $getcell;
        }
    }
    $lists_data[] = array_chunk($lists_kb,7);
    $room_arr = explode(' ',$excelLoad->getActiveSheet()->getCell("F1")->getValue());
    $type_arr = explode(' ',str_replace(iconv("GBK","UTF-8//IGNORE",'个座位'), '', str_replace(iconv("GBK","UTF-8//IGNORE",'教室类型:'), '', $excelLoad->getActiveSheet()->getCell("H1")->getValue())));
    $build =  $room_arr[1]; //教学楼
    $room =  $room_arr[2]; //教室号
    $type = $type_arr[0]; //教室类型
    $seat = $type_arr[1]; //座位数
    if($M->add_js('wenjing_js',$build,$room,$type,$seat,$_section+1,$_day+1,$lists_data[0][$_section][$_day])){
        return '1';
    }else{
        return $room.'*****';
    }
}
$file_arr = glob('freeroom/*.xls');
$count = count($file_arr);
for($i=0; $i<$count; $i++){
    for ($k=0; $k<=11; $k++) {
        for ($j=0; $j<=6; $j++) {
            print_r(read_xls($file_arr[$i],$k,$j));
        }
    }
}
?>