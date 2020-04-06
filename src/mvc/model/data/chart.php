<?php
/* @var \bbn\mvc\model $model */
if ($model->has_data(['type', 'values', 'end'], true)) {
  /*
  $ret = [
    'data' => [
      'series' => [],
      'labels' => []
    ],
    'success' => true
  ];
  if ( $values = $model->db->select_all([
    'table' => 'bbn_statistics',
    'fields' => [],
    'where' => [
      'conditions' => [[
        'field' => 'id_option',
        'value' => $model->data['type']
      ]]
    ],
    'order' => [[
      'field' => 'day',
      'dir' => 'DESC'
    ]],
    'limit' => 50
  ]) ){
    foreach ( array_reverse($values) as $val ){
      $ret['data']['series'][] = $val->res;
      $ret['data']['labels'][] = $val->day;
    }
  }
  return $ret;
  */
  $stat = new \bbn\appui\statistic($model->db, $model->data['type']);
  
  return [
    'success' => true,
    'data' => $stat->serie($model->data['values'], $model->data['start'], $model->data['end'])
  ];
}
return ['success' => false];