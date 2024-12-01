<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartHome Control</title>
    <!-- Minimized CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card i {
            transition: transform 0.3s ease;
        }

        .card:hover i {
            transform: scale(1.2);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Smart<span>Home</span></a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <h1 class="text-center mb-4">SmartHome Control</h1>
        <div class="row g-3">
            <!-- Lamp -->
            <div class="col-sm-6 col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-lightbulb fs-1 text-warning" id="lamp-icon"></i>
                        <h5 class="card-title mt-3">Lamp</h5>
                        <p id="lamp-status" class="text-muted">Status: Off</p>
                        <button onclick="toggleObject('Lamp', 'on')" class="btn btn-success">Turn On</button>
                        <button onclick="toggleObject('Lamp', 'off')" class="btn btn-danger">Turn Off</button>
                    </div>
                </div>
            </div>

            <!-- Fan -->
            <div class="col-sm-6 col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-fan fs-1 text-primary" id="fan-icon"></i>
                        <h5 class="card-title mt-3">Fan</h5>
                        <p id="fan-status" class="text-muted">Status: Off</p>
                        <button onclick="toggleObject('Fan', 'on')" class="btn btn-success">Turn On</button>
                        <button onclick="toggleObject('Fan', 'off')" class="btn btn-danger">Turn Off</button>
                    </div>
                </div>
            </div>

            <!-- TV -->
            <div class="col-sm-6 col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-tv-fill fs-1 text-dark" id="tv-icon"></i>
                        <h5 class="card-title mt-3">TV</h5>
                        <p id="tv-status" class="text-muted">Status: Off</p>
                        <button onclick="toggleObject('TV', 'on')" class="btn btn-success">Turn On</button>
                        <button onclick="toggleObject('TV', 'off')" class="btn btn-danger">Turn Off</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="status-container" class="mt-4">
            <h3>Device Status:</h3>
            <p id="loading-text">Loading...</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleObject(object, state) {
            const statusElement = document.getElementById(`${object.toLowerCase()}-status`);
            const iconElement = document.getElementById(`${object.toLowerCase()}-icon`);

            // Update status
            if (state === 'on') {
                statusElement.textContent = 'Status: On';
                statusElement.classList.remove('text-muted');
                statusElement.classList.add('text-success');
            } else {
                statusElement.textContent = 'Status: Off';
                statusElement.classList.remove('text-success');
                statusElement.classList.add('text-muted');
            }

            // Update icon style
            if (object === 'Fan') {
                iconElement.classList.toggle('animate-spin', state === 'on');
            }
        }

        function fetchStatus() {
            // Replace with your Laravel route
            const url = "{{ route('getStatus') }}";

            $.get(url, function (data) {
                let statusHtml = '<h3>Device Status:</h3><ul class="list-group">';
                $.each(data, function (device, status) {
                    statusHtml += `<li class="list-group-item">${device.toUpperCase()}: ${status}</li>`;
                });
                statusHtml += '</ul>';
                $('#status-container').html(statusHtml);
            }).fail(function () {
                $('#status-container').html('<p>Error fetching status</p>');
            });
        }

        // Update status every 10 seconds
        setInterval(fetchStatus, 10000);
        fetchStatus();
    </script>
</body>

</html>
