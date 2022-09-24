<?php


 class database{
    //单例数据库类
    private static $Db;
    private $mysqli;
    private $db_host;
    private $db_user;
    private $db_pwd;
    private $db_name;
    private $db_port;
    private $charset;

    //创建对象
    public function __construct($host, $user, $pwd, $name, $port, $charset)
    {
        $this->db_host = $host;
        $this->db_user = $user;
        $this->db_pwd = $pwd;
        $this->db_name = $name;
        $this->db_port = $port;
        $this->charset = $charset;
        $this->connect();
        $this->setCharSet();
    }
    //创建连接
    private function connect()
    {
        @$this->mysqli = new \mysqli($this->db_host, $this->db_user, $this->db_pwd, $this->db_name, $this->db_port);
        if ($this->mysqli->connect_errno != 0) {
            echo "<h2>MySql连接错误！</h2>";
            die();
        }
    }

    //设置编码
    private function setCharSet()
    {
        $this->mysqli->set_charset($this->charset);
    }

    //判断sql语句是否出错
    private function isErr()
    {
        if ($this->mysqli->errno != 0) {
            echo $this->mysqli->errno();
            die();
        }
    }


    public function query($sql, $mode = 1)
    {

        //$mode解释： 1：关联数组  2：索引数组  3：混合数组
        if (strtoupper(substr($sql, 0, 6)) != "SELECT") {
            die("query函数只能接受SELECT语句！");
        }
        @$result = $this->mysqli->query($sql);
        $this->isErr();      //判断语句是否出错
        $data = array();    //返回的结果数组
        if ($this->mysqli->affected_rows == 1) {
            //只有一行数据时直接返回一维数组
            $data = $result->fetch_array($mode);
        } else {
            //有多行数据是返回二维数组
            while ($row = $result->fetch_array($mode)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function exec($sql)
    {
        if (strtoupper(substr($sql, 0, 6)) == "SELECT") {
            die("exec函数只能接受非SELECT语句！");
        }
        if (@!$this->mysqli->query($sql)) {
            $this->isErr();      //判断语句是否出错
        } else {
            return true;
        }
    }

    public function rowCount($sql)
    {
        @$this->mysqli->query($sql);
        $this->isErr();      //判断语句是否出错
        return $this->mysqli->affected_rows;
    }

    public function set($name, $pass)
    {
        // return  "select * from users where name= '$name' and pass= '$pass'";
        return "select * from users where username= '$name' and password= '$pass'";
    }


}

?>