<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartHome Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    {{-- my custome css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- AnimateCss --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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
        <h1 class="text-center mb-4 animate__animated animate__fadeInDown animate__delay-1s" id="controls">SmartHome
            Control</h1>
        <div class="row g-3">
            <!-- Lamp -->
            <div class="col-md-4 animate__animated animate__fadeInLeft animate__delay-2s">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-lightbulb fs-1 text-warning" id="lamp-icon"></i>
                        <h5 class="card-title mt-3">Lamp</h5>
                        <p id="lamp-status" class="text-muted">Status: Off</p>
                        <button class="btn btn-success me-2" onclick="toggleObject('Lamp', 'on')">On</button>
                        <button class="btn btn-danger" onclick="toggleObject('Lamp', 'off')">Off</button>
                    </div>
                </div>
            </div>

            <!-- Fan -->
            <div class="col-md-4 animate__animated animate__fadeInRight animate__delay-2s">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-fan fs-1 text-primary" id="fan-icon"></i>
                        <h5 class="card-title mt-3">Fan</h5>
                        <p id="fan-status" class="text-muted">Status: Off</p>
                        <button class="btn btn-success me-2" onclick="toggleObject('Fan', 'on')">On</button>
                        <button class="btn btn-danger" onclick="toggleObject('Fan', 'off')">Off</button>
                    </div>
                </div>
            </div>

            <!-- TV -->
            <div class="col-md-4 animate__animated animate__fadeInLeft animate__delay-2s">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-tv-fill fs-1 text-dark" id="tv-icon"></i>
                        <h5 class="card-title mt-3">TV</h5>
                        <p id="tv-status" class="text-muted">Status: Off</p>
                        <button class="btn btn-success me-2" onclick="toggleObject('TV', 'on')">On</button>
                        <button class="btn btn-danger" onclick="toggleObject('TV', 'off')">Off</button>
                    </div>
                </div>
            </div>

            <!-- Heater -->
            <div class="col-md-4 animate__animated animate__fadeInRight animate__delay-2s">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-thermometer-sun fs-1 text-danger" id="heater-icon"></i>
                        <h5 class="card-title mt-3">Heater</h5>
                        <p id="heater-status" class="text-muted">Status: Off</p>
                        <button class="btn btn-success me-2" onclick="toggleObject('Heater', 'on')">On</button>
                        <button class="btn btn-danger" onclick="toggleObject('Heater', 'off')">Off</button>
                    </div>
                </div>
            </div>

            <!-- AC -->
            <div class="col-md-4 animate__animated animate__fadeInLeft animate__delay-2s">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-wind fs-1 text-info" id="ac-icon"></i>
                        <h5 class="card-title mt-3">AC</h5>
                        <p id="ac-status" class="text-muted">Status: Off</p>
                        <button class="btn btn-success me-2" onclick="toggleObject('AC', 'on')">On</button>
                        <button class="btn btn-danger" onclick="toggleObject('AC', 'off')">Off</button>
                    </div>
                </div>
            </div>
    </div>


        <script>
            function toggleObject(object, state) {
                    const statusElement = document.getElementById(`${object.toLowerCase()}-status`);
                    const iconElement = document.getElementById(`${object.toLowerCase()}-icon`);

                    if (state === 'on') {
                        statusElement.textContent = 'Status: On';
                        statusElement.classList.remove('text-muted');
                        statusElement.classList.add('text-success');
                    } else {
                        statusElement.textContent = 'Status: Off';
                        statusElement.classList.remove('text-success');
                        statusElement.classList.add('text-muted');
                    }

                    // Perubahan ikon khusus
                    switch (object) {
                        case 'Lamp':
                            iconElement.className = state === 'on' ? 'bi bi-lightbulb-fill fs-1 text-warning' : 'bi bi-lightbulb fs-1 text-warning';
                            break;
                        case 'Fan':
                            iconElement.className = state === 'on' ? 'bi bi-fan fs-1 text-primary animate__spin' : 'bi bi-fan fs-1 text-primary';
                            break;
                        case 'TV':
                            iconElement.className = state === 'on' ? 'bi bi-tv fs-1 text-dark' : 'bi bi-tv-fill fs-1 text-dark';
                            break;
                        case 'Heater':
                            iconElement.className = state === 'on' ? 'bi bi-thermometer-high fs-1 text-danger' : 'bi bi-thermometer-sun fs-1 text-danger';
                            break;
                        case 'AC':
                            iconElement.className = state === 'on' ? 'bi bi-wind fs-1 text-info animate__shakeX' : 'bi bi-wind fs-1 text-info';
                            break;
                    }

                    // Mengirim data ke server (opsional)
                    fetch('/toggle', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ object, state })
                    })
                        .then(response => response.json())
                        .then(data => console.log(data.message))
                        .catch(error => console.error(error));
                }

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
