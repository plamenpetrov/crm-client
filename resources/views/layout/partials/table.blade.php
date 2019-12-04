<link rel="stylesheet" type="text/css" media="screen" href="/css/ui.jqgrid.css" />
<!--<link rel="stylesheet" type="text/css" media="screen" href="/css/ui.jqgrid-bootstarp.css" />-->
<script src="/js/jqgrid/i18n/grid.locale-{!! Session::get('locale') !!}.js" type="text/javascript"></script>
<script src="/js/jqgrid/jquery.jqGrid.min.js" type="text/javascript"></script>

<style>

    .ui-jqgrid-view>.ui-jqgrid-titlebar {
        height: 40px;
        line-height: 24px;
        color: #FFF;
        background: #4CACCA;
        padding: 0;
        font-size: 15px;
    }

    .ui-jqgrid .ui-jqgrid-pager {
        line-height: 15px;
        height: 55px;
        padding-top: 3px!important;
        padding-bottom: 5px!important;
        background-color: #eff3f8!important;
        border-bottom: 1px solid #E1E1E1!important;
        border-top: 1px solid #E1E1E1!important;
    }

    .ui-widget-content {
        border: transparent !important;
    }

    .ui-jqgrid .ui-jqgrid-title {
        line-height: 2.5em;
        padding-left: 10px;
    }

    .ui-jqgrid .ui-pg-input, .ui-jqgrid .ui-jqgrid-toppager .ui-pg-input {
        height: auto;
    }

    tr[tabindex]{
        background: #f9f9f9 !important;
        cursor: pointer;
    }
    
    tr[tabindex] td { 
        font-size: 10pt;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        padding: 5px !important;
    }
    
    .ui-jqgrid tr.jqgroup td {
        font-weight: bold !important;
        font-size: 10pt;
    }
    
    table.navtable tbody tr td:nth-child(2){
        display: none;
    }
    
    .ui-jqgrid .ui-jqgrid-view input, .ui-jqgrid .ui-jqgrid-view select, .ui-jqgrid .ui-jqgrid-view textarea, .ui-jqgrid .ui-jqgrid-view button {
        width: 20px;
        display: block;
        position: relative;
        height: 19px;
    }

</style>