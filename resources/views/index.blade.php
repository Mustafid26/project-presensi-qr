@extends ('layouts.main')

@section ('container')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (session()->has('gagal'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('gagal') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <video id="preview" style="width:100%; border-style:solid"></video>
            <h3>Input Kamera : </h3>
            <select class="form-select" id="camera-list" onchange="changeCamera()"></select>
            <button class="btn btn-primary mt-2" onclick="startCamera()">Hidupkan  Kamera</button>
            <button class="btn btn-danger mt-2" onclick="stopCamera()">Matikan Kamera</button>
            <form action="{{ route('store') }}" method="POST" id="form">
                @csrf
                <input type="hidden" name="ig_sudah_absen" id="ig_sudah_absen">
            </form>
        </div>
        <div class="col-lg-8 table-responsive mt-5 mb-5">
            <table class="table table-striped text-center">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TANGGAL DAN WAKTU KEHADIRAN</th>
                </tr>
                @foreach($absen as $a)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $a->pengurus->nama }}
                    </td>
                    <td>
                        {{ $a->tanggal }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script src="/js/app.js"></script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
      console.log(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });

    scanner.addListener('scan', function(c){
        document.getElementById('ig_sudah_absen').value = c;
        document.getElementById('form').submit();
    })
</script>
<script>
    async function startCamera() {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        const videoElement = document.getElementById('preview');
        videoElement.srcObject = stream;
    }
    Instascan.Camera.getCameras().then(function (cameras) {
      const cameraList = document.getElementById('camera-list');
      cameras.forEach(function (camera) {
        const option = document.createElement('option');
        option.value = camera.id;
        option.text = camera.name;
        cameraList.appendChild(option);
      });
      // const storedCameraId = localStorage.getItem('selectedCameraId');
      // if (storedCameraId) {
      //   cameraList.value = storedCameraId;
      //   changeCamera(); // Pemilihan kamera otomatis jika ada yang tersimpan
      // }
    }).catch(function (err) {
      console.error(err);
    });
    function changeCamera() {
      const cameraList = document.getElementById('camera-list');
      const selectedCameraId = cameraList.value;
      const selectedCameraName = cameraList.options[cameraList.selectedIndex].text;
      console.log(`Selected camera: ${selectedCameraName} (${selectedCameraId})`);

      // localStorage.setItem('selectedCameraId', selectedCameraId);

      navigator.mediaDevices.getUserMedia({ video: { deviceId: selectedCameraId } })
    .then(stream => {
      // Dapatkan elemen video
      const videoElement = document.getElementById('preview');
      videoElement.srcObject = stream;
    })
    .catch(error => {
      console.error('Gagal mendapatkan akses ke perangkat masukan media:', error);
    });
    }
    function stopCamera() {
        const stream = document.getElementById('preview').srcObject;
        const tracks = stream.getTracks();
        tracks.forEach(function(track) {
          track.stop();
        });
    }
    startCamera();
  </script>
@endsection