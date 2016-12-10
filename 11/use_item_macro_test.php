<?php
// use_item_macro_test.php

function use_item_test($item_macro) {
    $ret = array();
    $awk = explode(',', $item_macro);
    foreach($awk as $m) {
        $ret[] = use_item_test_mono($m);
    }
    return $ret;
}

function use_item_test_mono($item_macro_mono) {
    //
    $ret = array();
    //
    $awk = explode(':', $item_macro_mono);
    if ('HP回復' === $awk[0]) {
        $ret[0] = 'hp';
        $ret[1] = $awk[1];
    } else if ('MP回復' === $awk[0]) {
        $ret[0] = 'mp';
        $ret[1] = $awk[1];
    }
    return $ret;
}

//
function item_assert($item_macro, $type, $num) {
    $r = use_item_test($item_macro);
    var_dump($item_macro);
    var_dump($r);
    echo "\n";
/*
    if ($type != $r[0]) {
        echo "ng....\n";
        return;
    }
    if ($num != $r[1]) {
        echo "ng....\n";
        return;
    }
    echo "ok\n";
*/
    return ;
}

//
$r = item_assert('HP回復:100', 'hp', 100);
$r = item_assert('MP回復:100', 'mp', 100);
$r = item_assert('HP回復:50,MP回復:100', 'mp', 100);


/*
function use_item_test($item_macro) {
    //
    $ret = array();
    //
    $awk = explode(':', $item_macro);
    if ('HP回復' === $awk[0]) {
        $ret[0] = 'hp';
        $ret[1] = $awk[1];
    } else if ('MP回復' === $awk[0]) {
        $ret[0] = 'mp';
        $ret[1] = $awk[1];
    }
    return $ret;
}

//
function item_assert($item_macro, $type, $num) {
    $r = use_item_test($item_macro);
    if ($type != $r[0]) {
        echo "ng....\n";
        return;
    }
    if ($num != $r[1]) {
        echo "ng....\n";
        return;
    }
    echo "ok\n";
    return ;
}

//
$r = item_assert('HP回復:100', 'hp', 100);
$r = item_assert('HP回復:50', 'hp', 50);
$r = item_assert('MP回復:100', 'mp', 100);
*/

/*
function use_item_test($item_macro) {
    //
    $awk = explode(':', $item_macro);
    return $awk[1];
}
//
$r = use_item_test('HP回復:100');
if (100 == $r) {
    echo "ok\n";
} else {
    echo "ng....\n";
}
//
$r = use_item_test('HP回復:50');
if (50 == $r) {
    echo "ok\n";
} else {
    echo "ng....\n";
}
*/

/*
function use_item_test($item_macro) {
    //
    $ret = '';
    //
    $r = strpos($item_macro, 'HP回復');
    //var_dump($r);
    if (false !== $r) {
        // HP回復の数値を抜き出す処理
        $ret = substr($item_macro, strlen('HP回復'));
    }
    //
    return $ret;
}
//
$r = use_item_test('HP回復100');
if (100 == $r) {
  echo "ok\n";
} else {
  echo "ng....\n";
}
//
$r = use_item_test('HP回復50');
if (50 == $r) {
  echo "ok\n";
} else {
  echo "ng....\n";
}
//$r = use_item_test('MP回復100');
*/

