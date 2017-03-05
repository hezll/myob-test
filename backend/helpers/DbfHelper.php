<?php
namespace backend\helpers;
/**
 * This is a Dbf Helper for analysis the Dbf file
 * User: hezll
 * Date: 27/02/2017
 * Time: 11:40 PM
 */
class DbfHelper
{
    public static function getInvoiceNumber($data)
    {
        $tmp = explode(' ',$data);
        if(strpos($tmp[0],'FD')!==false){
            return str_replace('FD','',$tmp[0]);
        }
    }

    public static function usubstr($str, $start, $length = null)
    {

        // 先正常截取一遍.
        $res = substr($str, $start, $length);
        $strlen = strlen($str);

        /* 接着判断头尾各6字节是否完整(不残缺) */
        // 如果参数start是正数
        if ($start >= 0) {
            // 往前再截取大约6字节
            $next_start = $start + $length; // 初始位置
            $next_len = $next_start + 6 <= $strlen ? 6 : $strlen - $next_start;
            $next_segm = substr($str, $next_start, $next_len);
            // 如果第1字节就不是 完整字符的首字节, 再往后截取大约6字节
            $prev_start = $start - 6 > 0 ? $start - 6 : 0;
            $prev_segm = substr($str, $prev_start, $start - $prev_start);
        } // start是负数
        else {
            // 往前再截取大约6字节
            $next_start = $strlen + $start + $length; // 初始位置
            $next_len = $next_start + 6 <= $strlen ? 6 : $strlen - $next_start;
            $next_segm = substr($str, $next_start, $next_len);

            // 如果第1字节就不是 完整字符的首字节, 再往后截取大约6字节.
            $start = $strlen + $start;
            $prev_start = $start - 6 > 0 ? $start - 6 : 0;
            $prev_segm = substr($str, $prev_start, $start - $prev_start);
        }
        // 判断前6字节是否符合utf8规则
        if (preg_match('@^([x80-xBF]{0,5})[xC0-xFD]?@', $next_segm, $bytes)) {
            if (!empty($bytes[1])) {
                $bytes = $bytes[1];
                $res .= $bytes;
            }
        }
        // 判断后6字节是否符合utf8规则
        $ord0 = ord($res[0]);
        if (128 <= $ord0 && 191 >= $ord0) {
            // 往后截取 , 并加在res的前面.
            if (preg_match('@[xC0-xFD][x80-xBF]{0,5}$@', $prev_segm, $bytes)) {
                if (!empty($bytes[0])) {
                    $bytes = $bytes[0];
                    $res = $bytes . $res;
                }
            }
        }
        if (strlen($res) < $strlen) {
            $res = $res . '...';
        }
        return $res;
    }
}
