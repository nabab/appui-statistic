<?php
/*
 * Describe what it does!
 *
 **/

/** @var $model \bbn\mvc\model*/
$res = [];
$stats = $model->inc->options->full_options('active', 'statistic', 'appui');
foreach ($stats as $stat) {
  $stat['num'] = $model->db->count('bbn_statistics', ['id_option' => $stat['id']]);
  $res[] = $stat;
}
return ['stats' => $res];