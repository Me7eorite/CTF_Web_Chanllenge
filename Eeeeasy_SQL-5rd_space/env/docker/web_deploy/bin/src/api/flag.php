<?php
error_reporting(0);

session_start();

if(isset($_SESSION['name'])){
        if($_SESSION['name'] === 'Flag_Account'){
            $file = urldecode($_GET['file']);
            if(!preg_match('/^\/flag|var|tmp|php|log|\%|sess|etc|usr|\.|\:|base|ssh|http/i',$_GET['file'])){
                readfile($file);
            }else{
                echo 'try again~';
            }
        show_source(__FILE__);
    }else{
        echo "USER No permission!!";
    }
}else{
    echo '登陆一下吧~';
}