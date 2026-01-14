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
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }
        
        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            background: linear-gradient(135deg, #ffffff, #e8edff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .hero-text h1:hover {
            transform: scale(1.03);
            filter: drop-shadow(0 10px 20px rgba(102, 126, 234, 0.3));
        }
        
        .hero-text p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            opacity: 0.95;
            line-height: 1.6;
            transition: all 0.3s ease;
        }
        
        .hero-text p:hover {
            opacity: 1;
            transform: translateX(5px);
        }
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero-visual { 
            position: relative; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 380px;
            animation: fadeInUp 0.8s ease-out 0.4s both;
            perspective: 1000px;
        }
        
        .hero-visual > div {
            transform-style: preserve-3d;
            animation: parallaxFloat 4s ease-in-out infinite;
        }
        
        @keyframes parallaxFloat {
            0%, 100% {
                transform: translateY(0px) rotateZ(-2deg) translateZ(50px);
            }
            50% {
                transform: translateY(-40px) rotateZ(2deg) translateZ(80px);
            }
        }
        .info-list { margin: 0; padding-left: 18px; color: #e8edff; line-height: 1.6; }
        .info-list li + li { margin-top: 8px; }
        
        .card-soft {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border: 2px solid transparent;
            background-clip: padding-box;
            position: relative;
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 20px;
        }
        
        .card-soft::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 20px;
            padding: 2px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.2));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
        
        .card-soft h3 {
            position: relative;
            z-index: 1;
        }
        .features-section { 
            background: rgba(255,255,255,0.05); 
            backdrop-filter: blur(10px); 
            padding: 60px 20px; 
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .features-grid { 
            max-width: 1200px; 
            margin: 0 auto; 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 30px; 
        }
        .feature-card { 
            background: linear-gradient(135deg, rgba(255,255,255,0.15), rgba(255,255,255,0.08));
            padding: 30px; 
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.2);
            text-align: center; 
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1), transparent);
            transform: translate(0, 0);
            transition: transform 0.6s ease;
        }
        
        .feature-card:focus-within { 
            outline: 2px solid #667eea; 
            outline-offset: 4px; 
        }
        .feature-card:hover { 
            transform: translateY(-8px);
            background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.12));
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        }
        
        .feature-card:hover::before {
            transform: translate(50%, 50%);
        }
        
        .feature-icon { 
            font-size: 3rem; 
            margin-bottom: 15px;
            animation: iconBounce 2s ease-in-out infinite;
        }
        
        .feature-card:nth-child(1) .feature-icon { animation-delay: 0s; }
        .feature-card:nth-child(2) .feature-icon { animation-delay: 0.2s; }
        .feature-card:nth-child(3) .feature-icon { animation-delay: 0.4s; }
        .feature-card:nth-child(4) .feature-icon { animation-delay: 0.6s; }
        
        @keyframes iconBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .feature-card h3 { 
            color: #667eea; 
            margin-bottom: 10px; 
            font-size: 1.3rem;
            position: relative;
            z-index: 1;
        }
        .feature-card p { 
            color: #f0f4ff; 
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }
        @media (max-width: 968px) {
            .hero-content { grid-template-columns: 1fr; gap: 40px; text-align: center; }
            .hero-text h1 { font-size: 2.5rem; }
            .hero-text p { font-size: 1.1rem; }
            .cta-buttons { justify-content: center; }
        }
        
        /* Floating decoration elements */
        .floating-orb {
            position: fixed;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.15), transparent);
            pointer-events: none;
            filter: blur(40px);
        }
        
        .orb-1 {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 5%;
            animation: floatOrb1 20s ease-in-out infinite;
        }
        
        .orb-2 {
            width: 250px;
            height: 250px;
            bottom: 20%;
            right: 5%;
            animation: floatOrb2 25s ease-in-out infinite;
        }
        
        @keyframes floatOrb1 {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(50px, -50px); }
            50% { transform: translate(100px, 0); }
            75% { transform: translate(50px, 50px); }
        }
        
        @keyframes floatOrb2 {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(-50px, 50px); }
            50% { transform: translate(-100px, 0); }
            75% { transform: translate(-50px, -50px); }
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
