<script>
    $(document).ready(function () {
        //custom script for pagination format
        $('.pagination li').addClass('page-item');
        $('.pagination li a').addClass('page-link');
        $('.pagination span').addClass('page-link');

        initForm();
        
        $(document).on("click", "a.change-layout", function (e) {
            changeLayout(this);
        });

        $(document).on("click", ".filters", function (e) {
            $('.filters-container').slideToggle();
        });

        $('select#per_page').on('change', function () {
            $('input#page').val('1');
            $('form.grid-data').submit();
        });

        $('a.exportTo').on('click', function () {
            $('input#exportType').val($(this).attr('data-export'));
            $('form.grid-data').submit();
        });
        
        $(document).on('shown.bs.modal', function() {
            initForm();
        });
        
        var placeholder = "&#xf002 Select a place";

        $(".search-contragent").select2({
            ajax: {
                url: '{!! route("contragent_search") !!}',
                dataType: 'json',
                delay: 500,
                placeholder: placeholder,
                data: function (params) {
                    return {
                        slug: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    var data = $.map(data, function (obj) {
                        obj.id = obj.id;
                        obj.text = obj.name + ', ' + obj.EIK;
                        return obj;
                    });
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 3,
            templateSelection: formatContragentRepoSelection
        });
        
        function formatContragentRepoSelection(repo) {
            return repo.name + ', ' + repo.EIK;
        }
        
        $(".search-all-contragent").select2({
            ajax: {
                url: '{!! route("contragent_search") !!}',
                dataType: 'json',
                delay: 500,
                allowClear: true,
                theme: 'bootstrap',
                data: function (params) {
                    return {
                        slug: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    var data = $.map(data, function (obj) {
                        obj.id = obj.id;
                        obj.text = obj.name + ', ' + obj.EIK;
                        return obj;
                    });
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 3,
            templateSelection: formatAllContragentRepoSelection
        });
        
        function formatAllContragentRepoSelection(repo) {
            var searchUrl = '/contragents/show/' + repo.id;
            window.location.replace(searchUrl);
        }
        
        $(".search-person").select2({
            ajax: {
                url: '{!! route("person_search") !!}',
                dataType: 'json',
                delay: 500,
                data: function (params) {
                    return {
                        slug: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    var data = $.map(data, function (obj) {
                        obj.id = obj.id;
                        obj.text = obj.first_name + ' ' + obj.family_name;
                        return obj;
                    });
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 3,
            templateSelection: formatPersonRepoSelection
        });
        
        function formatPersonRepoSelection(repo) {
            return repo.first_name + ' ' + repo.family_name;
        }
        
        $(".search-all-person").select2({
            ajax: {
                url: '{!! route("person_search") !!}',
                dataType: 'json',
                delay: 500,
                data: function (params) {
                    return {
                        slug: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    var data = $.map(data, function (obj) {
                        obj.id = obj.id;
                        obj.text = obj.first_name + ' ' + obj.family_name;
                        return obj;
                    });
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 3,
            templateSelection: formatAllPersonRepoSelection
        });
        
        function formatAllPersonRepoSelection(repo) {
            var searchUrl = '/persons/show/' + repo.id;
            window.location.replace(searchUrl);
        }
        
//        $('#calendar').fullCalendar('next');
    });

    function changeLayout(layout) {
        window.location = $(layout).attr('layout-uri');
    }
    
    function initForm() {
        $('.mdb-select').material_select();
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd',
            formatSubmit: 'yyyy-mm-dd',
        });
        
        $('.timepicker').pickatime({
            autoclose: true,
            'default': 'now'
        });
        
        
    }
</script>
