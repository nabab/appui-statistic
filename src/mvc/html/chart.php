<div class="bbn-overlay bbn-padding">
  <div class="bbn-flex-height">
    <div class="bbn-middle">
      &nbsp;<?= _("Start") ?>:&nbsp;
      <bbn-datepicker :min="min" :max="maxMinus" v-model="start"></bbn-datepicker>
      &nbsp;<?= _("End") ?>:&nbsp;
      <bbn-datepicker :min="minPlus" :max="today" v-model="end"></bbn-datepicker>
      &nbsp;#<?= _("Values") ?>:&nbsp;
      <bbn-numeric class="bbn-narrower" :min="10" :max="365" v-model="values"></bbn-numeric>
      &nbsp;
      <bbn-button :notext="true" icon="nf nf-fa-refresh" @click="refresh" label="<?= _('Refresh') ?>"></bbn-button>
      <bbn-dropdown class="bbn-wide"
                    :source="source.types"
                    source-value="id"
                    placeholder="<?= _("Statistic") ?>"
                    v-model="currentType"
      ></bbn-dropdown>
    </div>
    <div class="bbn-flex-fill">
      <bbn-chart v-bind="chartCfg"></bbn-chart>
    </div>
  </div>
</div>