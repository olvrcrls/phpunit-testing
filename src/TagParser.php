<?php

namespace App;
class TagParser
{
    public function parse(string $tags) : array 
    {
        $tags = preg_split("/ ?[,|!] ?/", $tags);

        // Old Version / Legacy Version
        // return array_map(function ($tag) {
        //     return trim($tag);
        // }, $tags);

        // New PHP 
        // return array_map(fn($tag) => trim($tag), $tags);
        
        return $tags;
    }
}