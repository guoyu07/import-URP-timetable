<?php
header("Content-type: text/html; charset=UTF-8");
error_reporting(0);
include 'lib/mysql.class.php';
include 'lib/PHPExcel.class.php';
include 'conn.php';
$excelReader = PHPExcel_IOFactory::createReader('Excel5');
try {
    $excelLoad = $excelReader->load('exam.xls',$encode='UTF-8');
}catch(Exception $e){
    exit($e);
}
$sheet = $excelLoad->getSheet(0); //取得sheet(0)表
$highestRow = $sheet->getHighestRow(); //取得总行数
$arr = array(1 => 'F', 2 => 'G', 3 => 'H', 4 => 'I', 5 => 'J');
for($j=3; $j<=$highestRow; $j++) {
    for($i=1; $i<=5; $i++) {
        $cell = $excelLoad->getActiveSheet()->getCell($arr[$i].$j)->getValue();
        if(is_object($cell)) $cell = $cell->__toString();
        $lists_exam[] = $cell;
    }
}
$lists_data = array_chunk($lists_exam,5);
foreach($lists_data as $data) {
    $time = $data[0];
    $name = $data[1];
    $class = $data[2];
    $num = $data[3];
    $room = $data[4];
    if($M->add_exam('wenjing_exam',$time,$name,$class,$num,$room)){
        echo '1';
    }else{
        echo '0';
    }
}
?>