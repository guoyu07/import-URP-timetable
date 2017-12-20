<?php
class mysql{
    private $conn;
    //连接数据库
    public function connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME){
        $this->conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME)or die('Mysql Error');
    }
    //执行SQL语句
    public function query($sql){
        return mysqli_query($this->conn,$sql);
    }
    //获取单条数据
    public function getOne($sql){
        $result = $this->query($sql);
        if($result){
            $data = mysqli_fetch_assoc($result);
            return $data;
        }
        return false;
    }
    //获取多条数据
    public function getAll($sql){
        $result = $this->query($sql);
        if($result){
            $num = mysqli_num_rows($result);
            for($i = 0;$i <= $num;$i++){
                $arr[] = mysqli_fetch_assoc($result);
            }
            array_pop($arr);
            return $arr;
        }
        return false;
    }
    //字符串编码
    public function deStr($str){
        if(get_magic_quotes_gpc()){
            return $str;
        }else{
            return addslashes($str);
        }
    }
    //插入课表数据
    public function add_kb($type,$term,$dept,$name,$data){
        if(empty($type) || empty($term) || empty($dept) || empty($name) || empty($data)){
            return false;
        }
        return $this->query("insert into `".$this->deStr($type)."` (`term`, `dept`, `name`, `data`) values ('".$this->deStr($term)."', '".$this->deStr($dept)."', '".$this->deStr($name)."', '".$this->deStr($data)."')");
    }
    //插入空教室数据
    public function add_js($table,$build,$room,$type,$seat,$section,$day,$week){
        if(empty($table) || empty($build) || empty($room) || empty($type) || empty($seat) || empty($section) || empty($day) || empty($week)){
            return false;
        }
        return $this->query("insert into `".$this->deStr($table)."` (`build`, `room`, `type`, `seat`, `section`, `day`, `week`) values ('".$this->deStr($build)."', '".$this->deStr($room)."', '".$this->deStr($type)."', '".$this->deStr($seat)."', '".$this->deStr($section)."', '".$this->deStr($day)."', '".$this->deStr($week)."')");
    }
    //插入考试安排数据
    public function add_exam($table,$time,$name,$class,$num,$room){
        if(empty($table) || empty($time) || empty($name) || empty($class) || empty($num) || empty($room)){
            return false;
        }
        return $this->query("insert into `".$this->deStr($table)."` (`time`, `name`, `class`, `num`, `room`) values ('".$this->deStr($time)."',  '".$this->deStr($name)."', '".$this->deStr($class)."', '".$this->deStr($num)."', '".$this->deStr($room)."')");
    }
}