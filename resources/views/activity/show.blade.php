<div class="card ">
    <div class="card-header white-text primary-color">
        <h4>Activity Feed</h4>
    </div>
    <div class="card-body scroll">
        @if (count($activities) > 0)
        <div class="activity-feed">
            <section class="activities">
                @include('activity.load', ['activities' => $activities])
            </section>
        </div>
        @endif
    </div>
    <div class="card-footer">
        <?php
            echo $paginator->links();
        ?>
    </div>
</div>

<script type="text/javascript">

    $(function () {
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();

            $('#load a').css('color', '#dfecf6');
            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

            var url = $(this).attr('href');
            getActivities(url);
            $(this).closest('ul')
                    .find('li.active')
                    .removeClass('active');
            
            $(this).closest('li')
                    .addClass('active');
            window.history.pushState("", "", url);
        });

        function getActivities(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.activities').html(data);
            }).fail(function () {
                alert('Activities could not be loaded.');
            });
        }
    });

</script>

<style>
    @import url(http://fonts.googleapis.com/css?family=Open+Sans);
    /* apply a natural box layout model to all elements, but allowing components to change */

    .activity-feed {
        padding: 15px;
        max-height: 400px;
        overflow: auto;
    }
    .activity-feed .feed-item {
        position: relative;
        padding-bottom: 20px;
        padding-left: 30px;
        border-left: 2px solid #e4e8eb;
    }
    .activity-feed .feed-item:last-child {
        border-color: transparent;
    }
    
    .activity-feed .feed-item:after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: -6px;
        width: 10px;
        height: 10px;
        border-radius: 6px;
        background: #fff;
        border: 1px solid #f37167;
    }
    
    .activity-feed .feed-item .date {
        position: relative;
        top: -5px;
        color: #8c96a3;
        text-transform: uppercase;
        font-size: 13px;
    }
    .activity-feed .feed-item .text {
        position: relative;
        top: -3px;
    }

</style>