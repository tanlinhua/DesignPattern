<?php
/**
 * 目的
 * 对比简单工厂模式的优点是，您可以将其子类用不同的方法来创建一个对象。
 * 举一个简单的例子，这个抽象类可能只是一个接口。
 * 这种模式是「真正」的设计模式， 因为他实现了 S.O.L.I.D 原则中「D」的 「依赖倒置」。
 * 这意味着工厂方法模式取决于抽象类，而不是具体的类。 这是与简单工厂模式和静态工厂模式相比的优势。
 */


//日志接口
interface Logger
{
    public function log(string $message);
}

//日志工厂接口
interface LoggerFactory
{
    public function createLogger(): Logger;
}

//控制台日志类
class StdoutLogger implements Logger
{
    public function log(string $message)
    {
        var_dump($message);
    }
}

//文件日志类
class FileLogger implements Logger
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $message)
    {
        var_dump($this->filePath);
        $result = file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
        var_dump($result);
    }
}

//控制台工厂类
class StdoutLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}

//文件日志工厂类
class FileLoggerFactory implements LoggerFactory
{
    /**
     * @var string
     */
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogger(): Logger
    {
        return new FileLogger($this->filePath);
    }
}


$loggerFactory = new StdoutLoggerFactory();
$logger = $loggerFactory->createLogger();
$logger->log("test");


$loggerFactory = new FileLoggerFactory(sys_get_temp_dir() . DIRECTORY_SEPARATOR . '1.log');
$logger = $loggerFactory->createLogger();
$logger->log("test");