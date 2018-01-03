<?php
use infrajs\event\Event;


Event::handler('Catalog.option', function (&$param) {

	$opt = &$param['option'];
	if ($opt['type'] == 'number') $opt['type'] = 'range';
	if ($opt['type'] == 'range') {
		usort($opt['values'], function ($v1, $v2){
			//if ($v1['filter']>$v2['filter']) return -1;
			//if ($v1['filter']<$v2['filter']) return 1;
			if ($v1['title']>$v2['title']) return 1;
			if ($v1['title']<$v2['title']) return -1;
		});
		/*print_r($opt);*/
	}

	/*if(sizeof($opt['values'])==1){
		if($opt['yes'] == $count){//Значение есть у всех позиций и только один вариант
			unset($params[$k]);
			continue;
		}
	}*/
});
