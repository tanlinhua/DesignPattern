<?php

/**
 * 目的:分离「策略」并使他们之间能互相快速切换。此外，这种模式是一种不错的继承替代方案（替代使用扩展抽象类的方式）
 */

interface Math
{
    public function calc($op1, $op2);
}

class MathAdd implements Math
{
    public function calc($op1, $op2)
    {
        return $op1 + $op2;
    }
}

class MathSub implements Math
{
    public function calc($op1, $op2)
    {
        return $op1 - $op2;
    }
}

class MathMul implements Math
{
    public function calc($op1, $op2)
    {
        return $op1 * $op2;
    }
}

class MathDiv implements Math
{
    public function calc($op1, $op2)
    {
        return $op1 / $op2;
    }
}

// 虚拟计算器
class CMath
{
    protected $math = null;

    public function __construct(Math $math)
    {
        $this->math = $math;
    }

    public function calc($op1, $op2)
    {
        return $this->math->calc($op1, $op2);
    }
}

$obj = new CMath(new MathAdd());
var_dump($obj->calc(6, 3));
$obj = new CMath(new MathSub());
var_dump($obj->calc(6, 2));
$obj = new CMath(new MathMul());
var_dump($obj->calc(6, 2));
$obj = new CMath(new MathDiv());
var_dump($obj->calc(6, 2));