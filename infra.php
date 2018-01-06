<?php
use infrajs\event\Event;


Event::handler('Catalog.option', function (&$param) {

	//Всё что в block попадает в шаблон с названием в blocks-$block['type']
	$opt = &$param['option'];
	$block = &$param['block'];
	if ($opt['type'] != 'number') return;
	$block['layout'] = 'range';	

	$block['max'] = (int) $opt['values'][0]['title'];
	$block['min'] = $block['max'];
	$step = 1;
	$values = array();
	foreach ($opt['values'] as $k => $val) {
		$vt = $opt['values'][$k]['title'];
		$v = (float) $vt;
		$values[] = $v;
		if ($v < $block['min']) {
			$d = $block['min'] - $v;
			if ($d < $step) $step = $d;
			
			$block['min'] = $v;
		} else if ($v > $block['max']) {
			$d = $v - $block['max'];
			if ($d < $step) $step = $d;
			$block['max'] = $v;
		}
	}
	$d = $block['max'] - $block['min'];
	$dstep = $d/100;
	if ($step < $dstep) $step = $dstep;
	$block['step'] = round($step,5);


	$block['minval'] = $block['min'];
	$block['maxval'] = $block['max'];
	
	if (isset($param['mymd']['minmax'])) {
		$r = explode('/', $param['mymd']['minmax']);
		if (sizeof($r) == 2) {
			$block['minval'] = $r[0];
			$block['maxval'] = $r[1];
		} else {
			$block['minval'] = $r[0];
			$block['maxval'] = $r[0];
		}
	}

	if (sizeof($opt['values']) > 20) {
		$values = array();
	}
	$block['values'] = $values;


	/*if ($opt['type'] == 'range') {
		usort($opt['values'], function ($v1, $v2){
			//if ($v1['filter']>$v2['filter']) return -1;
			//if ($v1['filter']<$v2['filter']) return 1;
			if ($v1['title']>$v2['title']) return 1;
			if ($v1['title']<$v2['title']) return -1;
		});
	}*/

	/*if(sizeof($opt['values'])==1){
		if($opt['yes'] == $count){//Значение есть у всех позиций и только один вариант
			unset($params[$k]);
			continue;
		}
	}*/
});
