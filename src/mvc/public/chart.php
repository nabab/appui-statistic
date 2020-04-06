<?php
/* @var \bbn\mvc\controller $ctrl */

$ctrl->combo(_('Chart'), [
  'types' => $ctrl->inc->options->full_options('active', 'statistic', 'appui')
]);