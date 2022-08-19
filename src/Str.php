<?php
declare (strict_types = 1);
namespace mtcore;

class Str {
    public function test() {
        return time();
    }
    /**
     * 生成登录的token
     * @param $string
     * @return string
     */
    public function getLoginToken(string $string) {
        //生成token
        $str = md5(uniqid(md5(microtime(true)),true)); //生成一个不会重复的字符串
        $token = sha1($str.time()); //加密
        return $token;
    }

    /**
     * 使用雪花算法，生成唯一字符串
     * @return int
     * @throws \Exception
     */
    public function snowflake() {
        $workId = rand(1,1023);
        return Snowflake::getInstance()->setWorkId($workId)->nextId();
    }

    /**
     * tp6自带命名会重复，使用雪花算法生成唯一名字
     * @return string
     * @throws \Exception
     */
    public function setFileName() {
        $fileName = rand(1, 999999).$this->snowflake();
        return date('Ymd').'/'.$fileName;
    }

    /**
     * 处理数组格式多个路径存储路径
     * 获取最后的日期路径和文件名格式
     * @param array $data
     * @return false
     */
    public function getFileSrcByArr(array $data = [] , string $option = 'image') {
        if(empty($data)){
            return false;
        }
        $src = [];
        foreach ($data as $val){
            if(!empty($val)){
                $src[] = $this->getFileSrc($val[$option]);
            }
        }

        return $src;
    }

    /**
     * 文件存储路径处理
     * 获取最后的日期路径和文件名格式
     * @param $src
     * @return string
     */
    public function getFileSrc(string $src = '') {
        if(empty($src)){
            return false;
        }
        $src = explode('/',$src);

        $end = array_pop($src);
        $endTwo = array_pop($src);

        return $endTwo.'/'.$end;
    }
}
