<?php

include "config.php";
include "database.php";

function waf($sql)
{
    return preg_match('/order|get_lock|select|updatexml|benchmark|extractive|exp|floor|regexp|like|group_concat|left|substr|mid|where|rlike|having|if|[*-]|&|=|\'|\"|\|| |and|sleep/i', $sql);
}
function Db($config): database
{
    return new database($config['host'],$config['user'],$config['pwd'],$config['dbName'],$config['dbPort'],$config['charset']);

}