<?php
use bbn\Appui\Statistic;

/** @var \bbn\mvc\controller $ctrl */
foreach (Statistic::getOptions('active') as $o) {
  if ($cfg = $ctrl->getPluginModel($o['code'], [], $ctrl->pluginUrl('appui-statistic'))) {
    $stat = new Statistic($ctrl->db, $o['code'], $cfg);
    $stat->update();
  }
  else {
    throw new Exception(_("Impossible to load the statistic") . ' ' . $o['code']);
  }
}
