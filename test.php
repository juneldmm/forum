<?php
/**
 * 工厂类，主要用来创建对象
 * 功能：根据输入的运算符号，工厂就能实例化出合适的对象
 *
 */
class Factory{
  public static function createObj($operate){
    switch ($operate){
      case '+':
        return new OperationAdd();
        break;
      case '-':
        return new OperationSub();
        break;
    }
  }
}
$test=Factory::createObj('/');
$result=$test->getValue(23,0);
echo $result;
?>

