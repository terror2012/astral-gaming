<!-- jQuery -->
<script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Hexagon Progress -->
<script type="text/javascript" src="../bower_components/HexagonProgress/jquery.hexagonprogress.min.js"></script>


<!-- Bootstrap -->
<script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Jarallax -->
<script type="text/javascript" src="../bower_components/jarallax/dist/jarallax.min.js"></script>

<!-- Smooth Scroll -->
<script type="text/javascript" src="../bower_components/smoothscroll-for-websites/SmoothScroll.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="../bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

<!-- Countdown -->
<script type="text/javascript" src="../bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>

<!-- Moment.js -->
<script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="../bower_components/moment-timezone/builds/moment-timezone-with-data.min.js"></script>
<!-- Youplay -->
<script type="text/javascript" src="../youplay/js/youplay.min.js"></script>

<!-- init youplay -->
<script>
    if(typeof youplay !== 'undefined') {
        youplay.init({
            // enable parallax
            parallax:         true,

            // set small navbar on load
            navbarSmall:      false,

            // enable fade effect between pages
            fadeBetweenPages: true,

            // twitter and instagram php paths
            php: {
                twitter: './php/twitter/tweet.php',
                instagram: './php/instagram/instagram.php'
            }
        });
    }
</script>


<script type="text/javascript">
    $(".countdown").each(function() {
        var tz = $(this).attr('data-timezone');
        var end = $(this).attr('data-end');
        end = moment.tz(end, tz).toDate();
        $(this).countdown(end, function(event) {
            $(this).text(
                    event.strftime('%D days %H:%M:%S')
            );
        });
    })
</script>

</body>