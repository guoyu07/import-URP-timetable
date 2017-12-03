<?php
header("Content-type: text/html; charset=GBK");
error_reporting(0);
include 'lib/mysql.class.php';
include 'lib/PHPExcel.class.php';
include 'conn.php';
function read_xls($file_name) {
    global $M;
    $excelReader = PHPExcel_IOFactory::createReader('Excel5');
    try {
        $excelLoad = $excelReader->load($file_name,$encode='GBK');
    }catch(Exception $e){
        exit($e);
    }
    $arr = array(1 => 'C', 2 => 'D', 3 => 'E', 4 => 'F', 5 => 'G', 6 => 'H', 7 => 'I');
    for($j=3; $j<=18; $j++) {
        for($i=1; $i<=7; $i++) {
            $_1_2 = $excelLoad->getActiveSheet()->getCell($arr[$i].$j)->getValue();
            $lists[$i][$j] = $_1_2;
            $lists_kb[] = $lists[$i][$j];
        }
    }
    for($j=20; $j<=35; $j++) {
        for($i=1; $i<=7; $i++) {
            $_3_4 = $excelLoad->getActiveSheet()->getCell($arr[$i].$j)->getValue();
            $lists[$i][$j] = $_3_4;
            $lists_kb[] = $lists[$i][$j];
        }
    }
    for($j=37; $j<=52; $j++) {
        for($i=1; $i<=7; $i++) {
            $_5_6 = $excelLoad->getActiveSheet()->getCell($arr[$i].$j)->getValue();
            $lists[$i][$j] = $_5_6;
            $lists_kb[] = $lists[$i][$j];
        }
    }
    $lists_data[] = array_chunk(array_chunk($lists_kb,7),8);
    $term = str_replace(iconv("GBK","UTF-8//IGNORE",'  °à¼¶¿Î±í'), '', $excelLoad->getActiveSheet()->getCell("A1")->getValue());
    $name = str_replace(iconv("GBK","UTF-8//IGNORE",'°àÃû:'), '', $excelLoad->getActiveSheet()->getCell("F1")->getValue());
    $dept = explode("1",$name);
    $data = json_encode(array('term'=>$term, 'name'=>$name, 'data'=>$lists_data), JSON_UNESCAPED_UNICODE);
    if($M->add_kb('student_kb',$term,$dept[0],$name,$data)){
        return '1';
    }else{
        return '0';
    }
}
$file_arr = glob('student/*.xls');
$count = count($file_arr);
for($i=0; $i<$count; $i++){
    print_r(read_xls($file_arr[$i]));
}
?>