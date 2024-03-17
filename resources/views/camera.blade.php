<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aktfkan Camera</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       video{
        width:100%;
        height:auto;
        border-radius: 8px;
        max-width : auto;
        max-height: auto;
    }

    .video-container{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #captureButton{
        margin-top: 10px;
        width:80%;
    }

    </style>
</head>
<body class="bg-light">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header">
                        Aktifkan Camera
                    </div>
                    <div class="card-body text-center">
                        <button id="activeButton" class="btn btn-primary"> Aktifkan Camera</button>
                        <div id="videoContainer" class="video-container d-none">
                            <video id="videoElement"></video>
                        </div>
                        <button id="captureButton" class="btn btn-success d-none">Ambil gambar</button>
                        <div><a href="{{route('daftar.create')}}"  class="btn btn-success ">Lanjutkan</a></div>
                    </div>

                </div>

            </div>

        </div>

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popper/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.boootstrapcdn.com/bootstrap/4.5.2/bootstrap.min.js"></script>

<script>
    $(document).ready(function (){
        var videoElement = document.getElementById('videoElement');
        var videoContainer = document.getElementById('videoContainer');

        var activeButton = document.getElementById('activeButton');
        var captureButton = document.getElementById('captureButton');

        activeButton.addEventListener('click', function(){
            navigator.mediaDevices.getUserMedia ({ video:true})
            .then(function(stream) {
                videoElement.srcObject =stream;
                videoElement.play();
                videoContainer.classList.remove('d-none');
                activeButton.classList.add('d-none');
                captureButton.classList.remove('d-none');

            })
            .catch(function(error){
                console.log("erroracessing camera:,error");
                alert("error aceesing camera ");
            });
        });
        captureButton.addEventListener('click',function(){
            var canvas = document.createElement('canvas');
            canvas.width =  videoElement.videoWidth;
            canvas.height =  videoElement.videoHeight;
            canvas.getContext('2d').drawImage(videoElement, 0,0,canvas.width,canvas.height);


            canvas.toBlob(function(blob){
                var today= new Date();
                var fileName = today.toISOString().slice(0,10) + '.png';

                var url= URL.createObjectURL(blob);

                var link = document.createElement('a');
                link.href= url;
                link.download = fileName;
                document.body.appendChild(link);
                link.click();

                URL.revokeObjectURL(url);

            }, 'image/png');

        });
    });
</script>
</body>
</html>
