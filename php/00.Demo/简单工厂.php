<?php

/**
 * 目的
 * 简单工厂模式是一个精简版的工厂模式。
 * 它与静态工厂模式最大的区别是它不是『静态』的。因为非静态，所以你可以拥有多个不同参数的工厂，你可以为其创建子类。
 * 甚至可以模拟（Mock）他，这对编写可测试的代码来讲至关重要。 这也是它比静态工厂模式受欢迎的原因！
 */


include "接口.php";

//静态工厂模式
class Factory
{
    /**
     * @throws Exception
     */
    public static function create($type)
    {
        if ($type == "mysql") {
            return new Mysql();
        } else if ($type == "sqlite") {
            return new Sqlite();
        } else {
            throw new Exception("error db type", -1);
        }
    }
}

//抽象工厂模式
//class Factory
//{
//    public function createMysql()
//    {
//        return new Mysql();
//    }
//
//    public function createSqlite()
//    {
//        return new Sqlite();
//    }
//}

try {
    $db1 = Factory::create("mysql");
    $db1->conn();
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $db2 = Factory::create("sqlite");
    $db2->conn();
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $db3 = Factory::create("oracle");
    $db3->conn();
} catch (Exception $e) {
    echo $e->getCode() . ":" . $e->getMessage() . "\r\n";
    var_dump($e->getTrace());
}