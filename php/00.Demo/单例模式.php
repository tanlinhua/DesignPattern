<?php

/**
 * 目的:在应用程序调用的时候，只能获得一个对象实例。
 */

final class Singleton
{
    /**
     * @var Singleton
     */
    private static $instance;

    /**
     * 通过懒加载获得实例（在第一次使用的时候创建）
     */
    public static function getInstance(): Singleton
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 不允许从外部调用以防止创建多个实例
     * 要使用单例，必须通过 Singleton::getInstance() 方法获取实例
     */
    private function __construct()
    {
    }

    /**
     * 防止实例被克隆（这会创建实例的副本）
     */
    private function __clone()
    {
    }

    /**
     * 防止反序列化（这将创建它的副本）
     */
    private function __wakeup()
    {
    }
}


$firstCall = Singleton::getInstance();
$secondCall = Singleton::getInstance();

if ($firstCall === $secondCall) {
    echo "是单例模式";
} else {
    echo "不是单例模式";
}

