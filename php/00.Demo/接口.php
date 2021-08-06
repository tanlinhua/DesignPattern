<?php

/**
 * 接口是抽象的类，无法直接实例化
 * 一种成员属性为抽象的特殊抽象类，在程序中同为规范的作用
 */

// 公共接口
interface Db
{
    public function conn();
}

class Mysql implements Db
{
    public function conn()
    {
        echo "连上了Mysql\r\n";
    }
}

class Sqlite implements Db
{
    public function conn()
    {
        echo "连上了Sqlite\r\n";
    }
}

//$db = new Mysql();
//$db->conn();
//$db = new Sqlite();
//$db->conn();