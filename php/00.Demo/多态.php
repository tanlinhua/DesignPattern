<?php

/**
 * 多态,指为不同数据类型的实体提供统一的接口。
 */

abstract class Tiger
{
    public abstract function climb(); //攀爬
}

class XTiger extends Tiger
{
    public function climb()
    {
        echo "爬不上去\r\n";
    }
}

class MTiger extends Tiger
{
    public function climb()
    {
        echo "爬到树顶\r\n";
    }
}

class Client
{
    public static function call(Tiger $animal)
    {
        $animal->climb();
    }
}

// 调用
Client::call(new XTiger());
Client::call(new MTiger());