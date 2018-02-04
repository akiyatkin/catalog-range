<?php
use infrajs\event\Event;


Event::handler('Catalog.option', function (&$param) {

	//Всё что в block попадает в шаблон с названием в blocks-$block['type']
	$opt = &$param['option'];
	$block = &$param['block'];
	if ($opt['type'] != 'number') return;
	if (sizeof($opt['values']) < 5) return;
	$block['layout'] = 'range';	

	$block['max'] = (int) $opt['values'][0]['title'];
	$block['min'] = $block['max'];
	
	$step = 0;
	$values = array();
	foreach ($opt['values'] as $k => $val) {
		$vt = $opt['values'][$k]['title'];
		$v = (float) $vt;
		$values[] = $v;
		if ($v <= $block['min']) {
			$d = $block['min'] - $v;
			$block['min'] = $v;
			if ($d && (!$step || $d < $step)) $step = $d;
		} else if ($v >= $block['max']) {
			$d = $v - $block['max'];
			$block['max'] = $v;
			if ($d && (!$step || $d < $step)) $step = $d;
		}
		
	}

	$tik = 20; //Максимальное количество шагов
	
	$block['min'] = floor($block['min']);
	$block['max'] = ceil($block['max']);

	$dif = $block['max'] - $block['min'];
	$dstep = $dif/$tik;
	if ($step < $dstep) $step = $dstep;

	if ($dif < 1) {
		$block['step'] = round($step,2);
		if (!$block['step']) $block['step'] = 0.01;
	} else if ($dif == 1) {
		$block['step'] = round($step,1);
		if (!$block['step']) $block['step'] = 0.1;
	} else if ($dif <= $tik) {
		$block['step'] = round($step);
		if (!$block['step']) $block['step'] = 1;
	} else {
		$ns = round($dif/$tik);
		if ($step > $ns) $block['step'] = round($step);
		else $block['step'] = $ns;
	}
	if ($block['step'] > 1) {
		$ost = $dif % $block['step'];
		if ($ost) {//Есть остаток от деления
			$block['max'] = $block['max'] + $block['step'] - $ost; //Добавляем к max для ровного деления
		}
	}


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
	if ($block['minval'] == $block['maxval']) {
		$block['minval'] = $block['minval'] - $block['step'];
		$block['maxval'] = $block['maxval'] + $block['step'];
		if ($block['minval'] < $block['min']) $block['minval'] = $block['min'];
		if ($block['maxval'] < $block['max']) $block['maxval'] = $block['max'];
	}

	if ($block['maxval'] > $block['max']) $block['maxval'] = $block['max'];
	if ($block['minval'] < $block['min']) $block['minval'] = $block['min'];


	if (sizeof($opt['values']) > 20) {
		$values = array();
	}
	$block['values'] = $values;
},'range');
