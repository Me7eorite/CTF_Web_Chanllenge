<?php
error_reporting(0);
include "func.php";
include "config.php";


session_start();
/**
 * 判断是否存在session
 */
if(!$_SESSION['name']){
    header("Location: index.html");
}



/**
 * 登录功能
 */

if (isset($_GET['command'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $name = $_POST['username'];
        $pass = $_POST['password'];

        $db = Db($config);

        if(waf($name) || waf($pass)){
            $result = array('success' => 0, 'msg' => 'hack?!');
            echo  json_encode($result);
            die();
        }

        $res = $db->query($db->set($name, $pass));

        if ($res != null && $res['password'] === $pass) {

            $result = array('success' => 1, 'msg' => '登录成功!');
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $pass;
            
        } else {

            $result = array('success' => 0, 'msg' => '账号或密码错误!');
        }

        echo  json_encode($result);

    }

}
?>
