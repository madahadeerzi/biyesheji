<?php
/**
 * Created by PhpStorm.
 * User: HuangSzeKit
 * Date: 2017/3/16
 * Time: 10:52
 */
$message = "@huangsijie:你好啊:我想问问这个多少钱";
$arr = split("@|:",$message);
var_dump($arr);
echo '<br/>';
echo $arr[1];