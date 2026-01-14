<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Welcome to our innovative platform with intuitive navigation" />
    <title>Welcome - Innovative Navigation Experience</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Space Grotesk', sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .landing-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .hero-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
            border-radius: 50%;
            filter: blur(60px);
            animation: float 6s ease-in-out infinite;
        }
        
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08), transparent);
            border-radius: 50%;
            filter: blur(50px);
            animation: float 8s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }
        
        .hero-content {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.08);
            padding: 50px 40px;
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        }
        
        .hero-text {
            color: white;
        }
        
        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.5px;
        }
        
        .hero-text p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            opacity: 0.95;
            line-height: 1.6;
        }
        
        .cta-buttons { 
            display: flex; 
            gap: 15px; 
            flex-wrap: wrap; 
        }
        
        .btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: white;
            transform: translateY(-3px);
        }
        
        .pill-link {
            transition: all 0.3s ease;
        }
        
        .pill-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        .hero-visual { position: relative; display: flex; align-items: center; justify-content: center; min-height: 380px; }
        .info-list { margin: 0; padding-left: 18px; color: #e8edff; line-height: 1.6; }
        .info-list li + li { margin-top: 8px; }
        .features-section { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 60px 20px; margin-top: 40px; }
        .features-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
        .feature-card { background: rgba(255,255,255,0.95); padding: 30px; border-radius: 15px; text-align: center; transition: transform 0.3s ease; cursor: pointer; }
        .feature-card:focus-within { outline: 2px solid #667eea; outline-offset: 4px; }
        .feature-card:hover { transform: translateY(-5px); }
        .feature-icon { font-size: 3rem; margin-bottom: 15px; }
        .feature-card h3 { color: #667eea; margin-bottom: 10px; font-size: 1.3rem; }
        .feature-card p { color: #555; line-height: 1.6; }
        @media (max-width: 968px) {
            .hero-content { grid-template-columns: 1fr; gap: 40px; text-align: center; }
            .hero-text h1 { font-size: 2.5rem; }
            .hero-text p { font-size: 1.1rem; }
            .cta-buttons { justify-content: center; }
        }
    </style>
</head>
<body>
    <header class="top-nav">
        <div class="brand"><span class="brand-dot"></span>Pie Menu</div>
        <nav class="nav-links">
            <a href="home.php">Home</a>
            <a class="pill-link" href="login.php">Login</a>
            <a class="pill-link" href="register.php">Register</a>
        </nav>
    </header>
    <div class="landing-container">
        <section class="hero-section">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="badge">Welcome</div>
                    <h1>Sign in or register to explore</h1>
                    <p>Login or create an account to access the new home page where the interactive pie menu now lives.</p>
                    <div class="cta-buttons">
                        <a class="btn btn-primary" href="login.php">Login</a>
                        <a class="btn btn-secondary" href="register.php">Register</a>
                        <a class="pill-link" href="home.php">View Home & Menu</a>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <div class="card-soft">
                        <h3>What changed?</h3>
                        <ul class="info-list">
                            <li>Menu button moved to the dedicated <strong>Home</strong> page.</li>
                            <li>Landing CTA now routes to <strong>Login</strong> and <strong>Register</strong>.</li>
                            <li>Credentials are validated against the MySQL users table.</li>
                        </ul>
                        <div class="feature-grid-simple">
                            <div class="feature-chip">Secure credential checks</div>
                            <div class="feature-chip">Password hashing</div>
                            <div class="feature-chip">Smooth navigation</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="features-section">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Fast & Intuitive</h3>
                    <p>Navigate with lightning speed using our radial menu design.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3>Beautiful Design</h3>
                    <p>Stunning visuals with smooth animations and modern aesthetics.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⌨️</div>
                    <h3>Keyboard Friendly</h3>
                    <p>Full keyboard support with arrow keys and shortcuts.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Responsive</h3>
                    <p>Works perfectly on all devices and screen sizes.</p>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
