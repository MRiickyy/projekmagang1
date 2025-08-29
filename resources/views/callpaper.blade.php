{{-- resources/views/callpaper.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call for Papers 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: #0a1f44;
            padding: 15px;
        }
        .navbar-brand {
            color: #00e3aa !important;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            margin-right: 15px;
        }
        .hero {
            background: linear-gradient(to right, #0a1f44, #1f3c77);
            color: white;
            padding: 50px 20px;
            text-align: center;
        }
        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .countdown div {
            background: #0d244f;
            padding: 15px 20px;
            border-radius: 10px;
        }
        .section-title {
            text-align: center;
            font-weight: bold;
            margin: 40px 0 20px;
        }
        .card-topic {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            height: 100%;
        }
        .guidelines, .important-dates {
            margin: 40px 0;
        }
        .footer {
            background: #0a1f44;
            color: white;
            padding: 30px 20px;
            margin-top: 40px;
        }
        .btn-green {
            background: #00e3aa;
            border: none;
            color: #0a1f44;
            font-weight: bold;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">ICOICT 2025</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Call for Papers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Speakers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Committees</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">For Authors</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="hero">
        <h2>THE 13TH ICOICT 2025</h2>
        <p>International Conference on Information and Communication Technology</p>
        <div class="countdown">
            <div><h4>24</h4><p>Days</p></div>
            <div><h4>14</h4><p>Hours</p></div>
            <div><h4>5</h4><p>Minutes</p></div>
            <div><h4>40</h4><p>Seconds</p></div>
        </div>
        <button class="btn btn-green mt-4">Register Now</button>
        <button class="btn btn-outline-light mt-4">Submit Your Paper</button>
    </section>

    {{-- Call for Papers --}}
    <h3 class="section-title">CALL FOR PAPERS</h3>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card-topic">
                    <h5>Artificial Intelligence & Machine Learning</h5>
                    <ul>
                        <li>Learning Algorithms & Methods</li>
                        <li>Explainable AI</li>
                        <li>Computer Vision</li>
                        <li>Natural Language Processing</li>
                        <li>AI in Healthcare</li>
                        <li>AI in Education</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-topic">
                    <h5>Data Science and Its Implementation</h5>
                    <ul>
                        <li>Big Data Analytics</li>
                        <li>Statistical Methods</li>
                        <li>Text Mining</li>
                        <li>Recommender Systems</li>
                        <li>Business Intelligence</li>
                        <li>Computational Statistics</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-topic">
                    <h5>IoT System and Infrastructure</h5>
                    <ul>
                        <li>IoT Architecture</li>
                        <li>5G Technology</li>
                        <li>Cloud Computing</li>
                        <li>Edge Computing</li>
                        <li>Smart Cities</li>
                        <li>Sensor Networks</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-topic">
                    <h5>Information Technology Applications</h5>
                    <ul>
                        <li>IT in Smart Cities</li>
                        <li>Cybersecurity</li>
                        <li>E-Learning</li>
                        <li>Business Analytics</li>
                        <li>Emerging IT Tech</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Submission Guidelines --}}
    <div class="container guidelines">
        <h4>SUBMISSION GUIDELINES</h4>
        <p>
            All papers must be original, technical-type paper, not published or under consideration elsewhere, and 
            must be submitted electronically in PDF format. Accepted papers will be submitted to IEEE Xplore.
        </p>
    </div>

    {{-- Important Dates --}}
    <div class="container important-dates text-center">
        <h4>IMPORTANT DATE (ROUND 2)</h4>
        <div class="row mt-4">
            <div class="col-md-4"><div class="card-topic"><b>Paper Submission Deadline</b><br>April 25, 2025</div></div>
            <div class="col-md-4"><div class="card-topic"><b>Notification of Acceptance</b><br>May 16, 2025</div></div>
            <div class="col-md-4"><div class="card-topic"><b>Camera-Ready Paper Deadline</b><br>June 20, 2025</div></div>
        </div>
    </div>

    {{-- Join Section --}}
    <div class="hero" style="background:#1f3c77; margin:40px 0;">
        <h4>JOIN US!</h4>
        <p>Share your insights and contribute to advancing knowledge in AI, IoT, and Data Science Technologies.</p>
        <button class="btn btn-green">Submit Your Paper</button>
    </div>

    {{-- Footer --}}
    <div class="footer text-center">
        <p>ICOICT 2025 Organized By: Telkom University Indonesia & Multimedia University Malaysia</p>
        <p>Sponsored By: <b>IEEE</b></p>
        <p>Visitors: 123456</p>
    </div>

</body>
</html>
