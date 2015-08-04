<?php
require 'config.php';
function __autoload($class)
{
    require PATHLIB.$class.'.php';
}
$bootstrap = new Bootstrap();