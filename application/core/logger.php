<?php


class Logger
{
    public function writeToLog($data, $title = '') {

        $log = "\n------------------------\n";
        $log .= date("Y.m.d G:i:s") . "\n";
        $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
        $log .= print_r($data, 1);
        $log .= "\n------------------------\n";
        $baseDir = $_SERVER['DOCUMENT'];
        file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);

        return true;
    }

    public function pre($obg){
        echo '<pre>';
        print_r($obg);
        echo '</pre>';
    }
}