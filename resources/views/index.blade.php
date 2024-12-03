<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartHome Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Smart<span>Home<i class="bi bi-house-heart-fill"></i></span></a>
        </div>
    </nav>
    @if(session('notification'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('notification') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center ">Control Perangkat</h1>

        <!-- Row 1 -->
        <div class="row g-3">
            <!-- LED -->
            <div class="col-md-4 ">
                <div class="card text-center shadow-sm p-3">
                    <div class="card-body">
                        <i class="bi bi-lightbulb fs-1 text-warning" id="lamp-icon"></i>
                        <h5 class="card-title mt-3">Lampu Kamer</h5>
                        <div id="status-led" class="status-text">
                            Kela mang...
                        </div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="led">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Hurung</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Parem</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- TV -->
            <div class="col-md-4 ">
                <div class="card text-center shadow-sm p-3">
                    <div class="card-body">
                        <i class="bi bi-tv-fill fs-1 text-dark" id="tv-icon"></i>
                        <h5 class="card-title mt-3">TV</h5>
                        <div id="status-tv" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="tv">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Hurung</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Parem</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- AC -->
            <div class="col-md-4 ">
                <div class="card text-center shadow-sm p-3">
                    <div class="card-body">
                        <i class="bi bi-wind fs-1 text-info" id="ac-icon"></i>
                        <h5 class="card-title mt-3">AC</h5>
                        <div id="status-ac" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="ac">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Hurung</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Parem</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-3">
            <!-- Heater -->
            <div class="col-md-4 ">
                <div class="card text-center shadow-sm p-3">
                    <div class="card-body">
                        <i class="bi bi-thermometer-sun fs-1 text-danger" id="heater-icon"></i>
                        <h5 class="card-title mt-3">Pemanas</h5>
                        <div id="status-airpurifier" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="airpurifier">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Hurung</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Parem</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Fan -->
            <div class="col-md-4 ">
                <div class="card text-center shadow-sm p-3">
                    <div class="card-body">
                        <i class="bi bi-fan fs-1 text-primary" id="fan-icon"></i>
                        <h5 class="card-title mt-3">Kipas</h5>
                        <div id="status-fan" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="fan">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Hurung</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Parem</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Servo -->
    <div class="col-md-4 ">
        <div class="card text-center shadow-sm p-3">
            <div class="card-body">
                <i class="bi bi-gear fs-1 text-secondary" id="servo-icon"></i>
                <h5 class="card-title mt-3">Servo</h5>
                <div id="status-servo" class="status-text">Kela mang...</div>
                <form method="POST" action="{{ route('control') }}">
                    @csrf
                    <input type="hidden" name="device" value="servo">
                    <button type="submit" name="status" value="on" class="btn btn-success me-2">Hurung</button>
                    <button type="submit" name="status" value="off" class="btn btn-danger">Parem</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function fetchStatus() {
            $.ajax({
                url: "{{ route('getStatus') }}",
                method: "GET",
                success: function (data) {
                    $.each(data, function (device, status) {
                        let statusText = status.toUpperCase();
                        let statusClass = status === "on" ? "status-text" : "status-text off";
                        $(`#status-${device}`).text(statusText).attr("class", statusClass);
                    });
                }
            });
        }

        setInterval(fetchStatus, 5000);
        fetchStatus();
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function fetchStatus() {
            $.ajax({
                url: "{{ route('getStatus') }}",
                method: "GET",
                success: function (data) {
                    $.each(data, function (device, status) {
                        let statusText = status.toUpperCase();
                        let statusClass = status === "on" ? "status-text" : "status-text off";
                        $(`#status-${device}`).text(statusText).attr("class", statusClass);
                    });
                }
            });
        }

        setInterval(fetchStatus, 5000);
        fetchStatus();
    </script>
</body>

</html>
