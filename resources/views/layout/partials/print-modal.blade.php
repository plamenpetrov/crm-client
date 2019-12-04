<script src="{!! asset('js/print/printThis.js') !!}" type="text/javascript"></script>

<div class="modal fade" id="printFormModal" tabindex="-1" role="dialog" aria-labelledby="printFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="printFormModalLabel">
                    <!--<span class="glyphicon glyphicon-print"></span>-->
                </h4>
            </div>
            <div class="modal-body" id="modalDiv">

            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <button type="button" id="printForm" class="btn btn-primary form-control btn-lg">
                            <span class="glyphicon glyphicon-print"></span>
                        </button>
                    </div>
                    <div class="col-md-6"><button type="button" class="btn btn-default form-control btn-lg" data-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>
    </div>
</div>