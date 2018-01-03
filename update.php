<?php
use infrajs\config\Config;
use infrajs\catalog\Catalog;

//Установка расширения на уровне конфига улучшаемого расширения.
if (!isset(Config::$sys['catalog'])) Config::$sys['catalog'] = array();
if (!isset(Config::$sys['catalog']['dependencies'])) Config::$sys['catalog']['dependencies'] = Catalog::$conf['dependencies'];
if (!in_array('catalog-range', Config::$sys['catalog']['dependencies'])) Config::$sys['catalog']['dependencies'][] = 'catalog-range';