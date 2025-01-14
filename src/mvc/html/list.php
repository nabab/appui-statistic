<!-- HTML Document -->
<bbn-table :source="source.stats"
           :sortable="true">
	<bbns-column field="id"
          :hidden="true">
  </bbns-column>
  <bbns-column field="code"
               :width="200"
               :label="_('Code')">
  </bbns-column>
  <bbns-column field="text"
               :label="_('Name')">
  </bbns-column>
  <bbns-column field="num"
               :width="100"
               :label="'#' + _('Days')">
  </bbns-column>
  <bbns-column :label="_('Actions')"
               :width="120"
               :buttons="[
                         {text: _('Reset'), icon: 'nf nf-mdi-refresh', action: reset}
                         ]">
  </bbns-column>
</bbn-table>