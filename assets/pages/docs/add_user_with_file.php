
<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">
    <title>افزودن کاربر با فایل متنی</title>


    <link rel='stylesheet' href='https://cdn.plyr.io/3.4.6/plyr.css'>

    <style>
        /* This is purely for the demo */
        .container {
            aspect-ratio: auto;
        }
        .plyr {
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>

<body translate="no" >
<div class="container">
    <video controls crossorigin playsinline id="player">
        <source src="/assets/video/add_user_with_file.mp4" type="video/mp4" size="720">
    </video>
</div>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

<script src='https://cdn.plyr.io/3.4.6/plyr.js'></script>
<script id="rendered-js" >
    document.addEventListener('DOMContentLoaded', () => {
        // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
        const player = new Plyr('#player');

        // Expose
        window.player = player;

        // Bind event listener
        function on(selector, type, callback) {
            document.querySelector(selector).addEventListener(type, callback, false);
        }

        // Play
        on('.js-play', 'click', () => {
            player.play();
        });

        // Pause
        on('.js-pause', 'click', () => {
            player.pause();
        });

        // Stop
        on('.js-stop', 'click', () => {
            player.stop();
        });

        // Rewind
        on('.js-rewind', 'click', () => {
            player.rewind();
        });

        // Forward
        on('.js-forward', 'click', () => {
            player.forward();
        });
    });
    //# sourceURL=pen.js
</script>



</body>

</html>
 
