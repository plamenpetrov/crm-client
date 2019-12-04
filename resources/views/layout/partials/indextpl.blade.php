<div class="">
    @foreach($data as $key => $value)
    <div class="box box-success">
        <div class="col-lg-12 col-md-12 box-header object-title">
            <h3 class="caption">{!! $key !!} </h3>
        </div>
        <div class="box-body">
            @foreach($value as $v)
            <div class="col-lg-4 col-md-12 margin5-0 height100 clearfix">
                <div class="">
                    <a href="{!! route($route, $v['id']) !!}">
                        <p class="block">
                            <span class="pull-left">
                                <span class="{!! $icon !!}"></span>
                                <b>{!! $v['label'] !!}</b>
                            </span>
                        </p>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="clearfix"></div>
    </div>
    @endforeach
    <div class="clearfix"></div>
</div>