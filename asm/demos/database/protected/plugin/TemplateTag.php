<?php

//register global/PHP functions to be used with your template files
//You can move this to common.conf.php   $config['TEMPLATE_GLOBAL_TAGS'] = array('isset', 'empty');
//Every public static methods in TemplateTag class (or tag classes from modules) are available in templates without the need to define in TEMPLATE_GLOBAL_TAGS 
Doo::conf()->TEMPLATE_GLOBAL_TAGS = array('upper', 'tofloat', 'sample_with_args', 'debug', 'triple');

/**
Define as class (optional)

class TemplateTag {
    public static test(){}
    public static test2(){}
}
**/

// the 1st argument must be the variable passed in from template, the other args should NOT be variables
function upper($str){
    return strtoupper($str);
}

function tofloat($str){
    return sprintf("%.2f", $str);
}

function sample_with_args($str, $prefix){
    return $str .' with args: '. $prefix;
}

function triple($str, $prefix='', $addup=0){
    return ($str*3+$addup) .' ( '. $str. $prefix . $addup . ' )';
}

function debug($var){
    if(!empty($var)){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

?>