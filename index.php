<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <video  id="videoel" autoplay muted playsInline> </video>
    <canvas id="canvas" hidden> </canvas>  
    <button id="btnSave">Save</button>

</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <!-- <script type="text/javascript">
        var video   = document.getElementById('videoel');
        var canvas      = document.getElementById('canvas');
        var ctx         = canvas.getContext('2d');
        var save =  document.getElementById('btnSave');
        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true, audio: false })
            .then(function (stream) {
                video.srcObject = stream;
            })
            .catch(function (err0r) {
                console.log("Something went wrong!");
            });
        }
        save.onclick = function() {
            console.log('click now')
            draw(video, ctx, canvas.width, canvas.height);
        }
        function draw(video, ctx, width, height){        
            ctx.drawImage(video, 0, 0, width, height);
            var dataURL = canvas.toDataURL("image/jpeg", 0.8);
            $.ajax({
                url: 'upload.php',
                type: "POST",
                data: {imgBase64: dataURL},
                success: function(data){
                    if(data) {
                        console.log('saved');
                    }
                    //do whatever.
                }


            });
            // setTimeout(draw, 250, video, ctx, width, height);
            // console.log('URL: ', dataURL);
        }
    </script> -->
</html>