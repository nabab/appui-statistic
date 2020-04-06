<?php
/** @var \bbn\mvc\controller $ctrl */
foreach (\bbn\appui\statistic::get_options('active') as $o) {
  if ($cfg = $ctrl->get_plugin_model($o['code'], [], $ctrl->plugin_url('appui-statistics'))) {
    $stat = new \bbn\appui\statistic($ctrl->db, $o['code'], $cfg);
    $stat->update();
  }
}