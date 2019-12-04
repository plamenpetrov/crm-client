@if(Session::has('error'))
<script>
    $(function () {
        $.bootstrapGrowl(" {!! Session::get('error') !!}", {
            ele: 'body', // which element to append to
            type: 'danger', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 40}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 'auto', // (integer, or 'auto')
            delay: 0, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    });
</script>
@endif  
@if(Session::has('success'))
<script>
    $(function () {
        $.bootstrapGrowl(" {!! Session::get('success') !!}", {
            ele: 'body', // which element to append to
            type: 'success', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 40}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 'auto', // (integer, or 'auto')
            delay: 8000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    });
</script>
@endif  
@if(Session::has('message'))
<script>
    $(function () {
        $.bootstrapGrowl(" {!! Session::get('message') !!}", {
            ele: 'body', // which element to append to
            type: 'info', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 40}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 'auto', // (integer, or 'auto')
            delay: 8000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    });
</script>
@endif  

@if(Session::has('messages'))

{!! Session::get('messages') !!}

@endif  