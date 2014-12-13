<?php

class application extends model{
    public $name="griff";
    public $version=0.1;
    public $source="hackaton";
    
    
    function info($data){
        return array($this);
    }
}
