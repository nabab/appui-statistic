<!-- HTML Document -->
<bbn-table :source="source.stats"
           :sortable="true">
	<bbns-column field="id"
          :hidden="true">
  </bbns-column>
  <bbns-column field="code"
               :width="200"
               :title="_('Code')">
  </bbns-column>
  <bbns-column field="text"
               :title="_('Name')">
  </bbns-column>
  <bbns-column field="num"
               :width="100"
               :title="'#' + _('Days')">
  </bbns-column>
  <bbns-column :title="_('Actions')"
               :width="120"
               :buttons="[
                         {text: _('Reset'), icon: 'nf nf-mdi-refresh', action: reset}
                         ]">
  </bbns-column>
</bbn-table>