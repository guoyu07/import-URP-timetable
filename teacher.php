<?php
header("Content-type: text/html; charset=GBK");
error_reporting(0);
include 'lib/mysql.class.php';
include 'lib/PHPExcel.class.php';
include 'conn.php';
function read_xls($file_name,$dept) {
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
    $term = str_replace(iconv("GBK","UTF-8//IGNORE",'  教师课表'), '', $excelLoad->getActiveSheet()->getCell("A1")->getValue());
    $name = str_replace(iconv("GBK","UTF-8//IGNORE",'教师:'), '', $excelLoad->getActiveSheet()->getCell("F1")->getValue());
    $data = json_encode(array('term'=>$term, 'dept'=>$dept, 'name'=>$name, 'data'=>$lists_data), JSON_UNESCAPED_UNICODE);
    if($M->add_kb('teacher_kb',$term,$dept,$name,$data)){
        return '1';
    }else{
        return '0';
    }
}
$file_arr = glob('teacher/*/*.xls');
$count = count($file_arr);
for($i=0; $i<$count; $i++){
    $dept = explode("/",$file_arr[$i]);
    echo read_xls($file_arr[$i],iconv("GBK","UTF-8//IGNORE",str_replace('文经学院', '', $dept[1])));
}
?>