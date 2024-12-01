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

<style>
    body {
        background-color: #f8f9fa;
        font-family: "Arial", sans-serif;
        color: #333;
    }

    .navbar {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        color: #ffffff;
    }

    .navbar-brand span {
        color: #c82333;
    }

    h1 {
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 30px;
    }

    .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .btn-success:hover,
    .btn-danger:hover {
        transform: scale(1.05);
    }

    .status-text {
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 10px;
        color: #28a745;
    }

    .status-text.off {
        color: #dc3545;
    }

</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Smart<span>Home</span></a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center">Device Control Panel</h1>

        <!-- Row 1 -->
        <div class="row mt-4">
            <!-- LED -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-lightbulb" style="font-size: 2.5rem; color: #555;"></i>
                        <h5 class="card-title mt-3">LED</h5>
                        <div id="status-led" class="status-text">
                            Kela mang...
                        </div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="led">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Turn On</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Turn Off</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- TV -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-tv" style="font-size: 2.5rem; color: #555;"></i>
                        <h5 class="card-title mt-3">TV</h5>
                        <div id="status-tv" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="tv">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Turn On</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Turn Off</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row">
            <!-- AC -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-snow" style="font-size: 2.5rem; color: #555;"></i>
                        <h5 class="card-title mt-3">AC</h5>
                        <div id="status-ac" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="ac">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Turn On</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Turn Off</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Air Purifier -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-wind" style="font-size: 2.5rem; color: #555;"></i>
                        <h5 class="card-title mt-3">Air Purifier</h5>
                        <div id="status-airpurifier" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="airpurifier">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Turn On</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Turn Off</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="row">
            <!-- Fan -->
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-fan" style="font-size: 2.5rem; color: #555;"></i>
                        <h5 class="card-title mt-3">Fan</h5>
                        <div id="status-fan" class="status-text">Kela mang...</div>
                        <form method="POST" action="{{ route('control') }}">
                            @csrf
                            <input type="hidden" name="device" value="fan">
                            <button type="submit" name="status" value="on" class="btn btn-success me-2">Turn On</button>
                            <button type="submit" name="status" value="off" class="btn btn-danger">Turn Off</button>
                        </form>
                    </div>
                </div>
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
</body>

</html>
