<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14
 * Time: 10:59
 */

namespace App\Markdown;


class Markdown
{
   protected  $parser;
    public function __construct(Parser $parser)
    {
        $this->parser=$parser;
    }

    public function markdown($text)
    {
        $html=$this->parser->makeHtml($text);
        return $html;
    }
}