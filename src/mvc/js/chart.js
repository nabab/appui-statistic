(() => {
  const DAY_LENGTH = 24 * 3600 * 1000;
  return {
    data(){
      return {
        currentType: '',
        chartData: {},
        min: '2014-01-01',
        today: bbn.fn.dateSQL((new Date()), true),
        values: 30,
        start: bbn.fn.dateSQL(bbn.fn.timestamp() - 29 * 24 * 3600 * 1000, true),
        end: bbn.fn.dateSQL((new Date()), true)
      }
    },
    computed: {
      startTime(){
        return bbn.fn.date(this.start).getTime();
      },
      endTime(){
        return bbn.fn.date(this.end).getTime();
      },
      valuesDays(){
        return this.values * DAY_LENGTH;
      },
      minPlus(){
        return bbn.fn.dateSQL(this.startTime + this.valuesDays, true);
      },
      maxMinus(){
        return bbn.fn.dateSQL(this.endTime - this.valuesDays, true);
      },
      isDaily(){
        return Math.round((this.endTime - this.startTime) / DAY_LENGTH) === this.values;
      },
      chartType(){
        if (this.currentType) {
          let total = bbn.fn.get_field(this.source.types, {id: this.currentType}, 'total');
          if (total) {
            return 'line';
          }
        }
        return 'bar';
      },
      chartCfg(){
        let cfg = {
          type: this.chartType,
        };
        if (this.isDaily) {
          cfg.xDate = "DD/MM/YY";
        }
        cfg.source = this.chartData;
        return cfg;
      }
    },
    methods: {
      refresh(){
        this.post(appui.plugins['appui-statistics'] + '/data/chart', {
          type: this.currentType,
          start: this.start,
          end: this.end,
          values: this.values
        }, d => {
          if ( d.success && d.data ){
            this.chartData = d.data;
          }
        })
      }
    },
    watch: {
      currentType(newVal){
        if ( newVal ){
          this.refresh();
        }
      }
    },
  };
})();