<?php
declare (strict_types = 1);
namespace mtcore\facade;

use think\Facade;

/**
 * @see \app\lib\Str
 * @package think\facade
 * @mixin \app\lib\Str
 * @method static getLoginToken(string $string) 生成登录的token
 * @method static snowflake() 使用雪花算法，生成唯一字符串
 * @method static setFileName() tp6自带命名会重复，使用雪花算法生成唯一名字
 * @method static getFileSrcByArr(array $data = [] , string $option = 'image') 处理数组格式多个路径存储路径,获取最后的日期路径和文件名格式
 * @method static getFileSrc(string $src = '') 文件存储路径处理,获取最后的日期路径和文件名格式
 */
class Str extends Facade {
    protected static function getFacadeClass() {
        return 'mtcore\Str';
    }
}
