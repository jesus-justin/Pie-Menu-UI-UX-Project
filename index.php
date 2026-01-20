<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Welcome to our innovative platform with intuitive navigation" />
    <meta name="theme-color" content="#0a0f1f" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
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
            transition: color 0.3s ease, background-color 0.3s ease;
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
            color: #f0f4ff;
            transition: background-color 0.5s ease;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Enhanced dark mode colors */
        ::selection {
            background: rgba(102, 126, 234, 0.3);
            color: #ffffff;
        }
        
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(102, 126, 234, 0.5);
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(102, 126, 234, 0.8);
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
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
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
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.15),
                0 0 40px rgba(102, 126, 234, 0.1) inset,
                0 0 60px rgba(231, 60, 126, 0.05);
            transition: all 0.4s ease;
        }
        
        .hero-content:hover {
            box-shadow: 
                0 12px 48px rgba(0, 0, 0, 0.2),
                0 0 60px rgba(102, 126, 234, 0.15) inset,
                0 0 80px rgba(231, 60, 126, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
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
            text-shadow: 
                0 20px 40px rgba(102, 126, 234, 0.2),
                0 10px 20px rgba(231, 60, 126, 0.15);
            letter-spacing: -1px;
            word-spacing: 0.1em;
        }
        
        .hero-text h1::first-line {
            line-height: 1.1;
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
        
        @keyframes fadeInUp {
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
        .info-list { 
            margin: 0; 
            padding-left: 18px; 
            color: #e8edff; 
            line-height: 1.8;
        }
        
        .info-list li { 
            margin-bottom: 12px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .info-list li:hover {
            color: #ffffff;
            transform: translateX(8px);
        }
        
        .info-list li strong {
            color: #667eea;
            font-weight: 600;
        }
        
        .info-list li + li { margin-top: 8px; }
        
        /* Stagger animations for button group */
        .cta-buttons .btn:nth-child(1) {
            animation: slideInButton 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
        }
        
        .cta-buttons .btn:nth-child(2) {
            animation: slideInButton 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s both;
        }
        
        .cta-buttons .btn:nth-child(3) {
            animation: slideInButton 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.6s both;
        }
        
        @keyframes slideInButton {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .card-soft {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border: 2px solid transparent;
            background-clip: padding-box;
            position: relative;
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 
                0 8px 24px rgba(0, 0, 0, 0.2),
                0 0 30px rgba(102, 126, 234, 0.08) inset;
            transition: all 0.3s ease;
            transform-style: preserve-3d;
        }
        
        .card-soft:hover {
            box-shadow: 
                0 12px 32px rgba(0, 0, 0, 0.3),
                0 0 40px rgba(102, 126, 234, 0.12) inset;
            transform: translateY(-4px) rotateX(5deg) rotateY(-5deg);
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
            font-size: 1.3rem;
            font-weight: 600;
            background: linear-gradient(135deg, #ffffff, #cfd9f2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .card-soft p, .info-list {
            font-weight: 500;
        }
        .features-section { 
            background: rgba(255,255,255,0.05); 
            backdrop-filter: blur(10px); 
            padding: 60px 20px; 
            margin-top: 40px;
            border-top: 2px solid rgba(255,255,255,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            position: relative;
        }
        
        .features-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.5), transparent);
            animation: waveShift 3s ease-in-out infinite;
        }
        
        @keyframes waveShift {
            0%, 100% {
                transform: translateX(-100px);
                opacity: 0.5;
            }
            50% {
                transform: translateX(100px);
                opacity: 1;
            }
        }
        
        /* ============================
           Micro-interactions
           ============================ */
        .hero-content:active {
            transform: scale(0.995);
        }
        
        .btn:active {
            transform: scale(0.95);
        }
        
        .feature-chip:active {
            transform: translateY(-3px) scale(0.95);
        }
        
        .pill-link:active {
            transform: translateY(-2px) scale(0.95);
        }
        
        .nav-links a:active {
            transform: translateY(1px);
        }
        
        .brand:active {
            transform: scale(0.98);
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
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .feature-card:hover .feature-icon {
            transform: rotate(360deg) scale(1.2);
            animation: none;
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
        
        /* ============================
           Header Navigation Styling
           ============================ */
        .top-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px;
            max-width: 1200px;
            margin: 0 auto;
            gap: 16px;
            position: relative;
            z-index: 100;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .brand {
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            animation: brandPulse 3s ease-in-out infinite;
            text-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
            transition: all 0.3s ease;
        }
        
        .brand:hover {
            text-shadow: 0 0 30px rgba(102, 126, 234, 0.8);
            transform: scale(1.05);
        }
        
        @keyframes brandPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .brand-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6fffd2, #7ec8ff);
            display: inline-block;
            animation: dotSpin 4s linear infinite;
            box-shadow: 0 0 15px rgba(111, 255, 210, 0.6);
        }
        
        @keyframes dotSpin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            font-weight: 500;
            position: relative;
        }
        
        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 14px;
            right: 14px;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .nav-links a:hover::before,
        .nav-links a:focus-visible::before {
            transform: scaleX(1);
        }
        
        .cta-buttons { 
            display: flex; 
            gap: 15px; 
            flex-wrap: wrap; 
            margin-top: 25px;
        }
        
        .btn {
            padding: 14px 32px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Space Grotesk', sans-serif;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn:active::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.35);
            position: relative;
        }
        
        .btn-primary::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            z-index: -1;
            filter: blur(10px);
            opacity: 0;
            animation: pulseGlow 2s ease-in-out infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% {
                opacity: 0;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 36px rgba(102, 126, 234, 0.5);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.7);
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(255, 255, 255, 0.2);
        }
        
        .pill-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 999px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
        }
        
        .pill-link:hover,
        .pill-link:focus-visible {
            border-color: rgba(102, 126, 234, 0.8);
            background: rgba(102, 126, 234, 0.12);
            transform: translateY(-2px);
            outline: none;
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.25);
        }
        
        /* ============================
           Badge Styling & Animation
           ============================ */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            border: 2px solid rgba(102, 126, 234, 0.4);
            font-weight: 600;
            letter-spacing: 0.06em;
            margin-bottom: 20px;
            animation: badgePulse 2.5s ease-in-out infinite, badgeBounce 3s ease-in-out infinite;
            color: #e8edff;
            font-size: 0.95rem;
        }
        
        @keyframes badgePulse {
            0%, 100% { 
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4);
            }
            50% { 
                box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
            }
        }
        
        @keyframes badgeBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        /* ============================
           Feature Chips Styling
           ============================ */
        .feature-grid-simple {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            margin-top: 24px;
        }
        
        .feature-chip {
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.08));
            color: #e8edff;
            font-weight: 500;
            font-size: 0.9rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-chip::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .feature-chip:hover::before {
            left: 100%;
        }
        
        .feature-chip:hover {
            border-color: rgba(102, 126, 234, 0.7);
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.12));
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.2);
        }
        
        /* ============================
           Scroll Animation Classes
           ============================ */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.23, 1, 0.320, 1);
        }
        
        .scroll-reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .feature-card.scroll-reveal.visible {
            animation: scaleReveal 0.8s cubic-bezier(0.23, 1, 0.320, 1);
        }
        
        @keyframes scaleReveal {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(30px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        
        @media (max-width: 968px) {
            .hero-content { 
                grid-template-columns: 1fr; 
                gap: 40px; 
                text-align: center;
                padding: 40px 30px;
            }
            .hero-text h1 { 
                font-size: 2.2rem;
                margin-bottom: 15px;
            }
            .hero-text p { 
                font-size: 1rem;
                margin-bottom: 25px;
            }
            .cta-buttons { 
                justify-content: center;
                flex-direction: column;
                align-items: stretch;
            }
            .btn {
                width: 100%;
            }
            .features-grid {
                grid-template-columns: 1fr;
            }
            .hero-section {
                padding: 30px 15px;
            }
            .top-nav {
                flex-wrap: wrap;
                gap: 10px;
            }
            .nav-links {
                width: 100%;
                justify-content: space-around;
                gap: 8px;
            }
        }
        
        @media (max-width: 640px) {
            .hero-text h1 {
                font-size: 1.8rem;
            }
            .hero-text p {
                font-size: 0.95rem;
            }
            .btn {
                padding: 12px 20px;
                font-size: 0.95rem;
            }
            .feature-grid-simple {
                grid-template-columns: 1fr;
            }
            .feature-chip {
                font-size: 0.85rem;
                padding: 10px 12px;
            }
            .features-section {
                padding: 40px 15px;
            }
            .hero-section::before,
            .hero-section::after {
                display: none;
            }
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
        
        /* ============================
           Footer Styling
           ============================ */
        .footer {
            background: rgba(255, 255, 255, 0.04);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px 20px;
            text-align: center;
            color: #a0aac0;
            font-size: 0.95rem;
            margin-top: 80px;
        }
        
        .footer p {
            margin: 8px 0;
            line-height: 1.6;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .footer-links a {
            color: #d1dcf3;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .footer-links a:hover {
            color: #667eea;
        }
        
        .footer-links a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: width 0.3s ease;
        }
        
        .footer-links a:hover::after {
            width: 100%;
        }
        
        /* ============================
           Animated Particles Background
           ============================ */
        .particle {
            position: fixed;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            pointer-events: none;
            animation: particleFloat 15s linear infinite;
            z-index: 0;
        }
        
        .particle:nth-child(1) { left: 10%; animation-duration: 12s; animation-delay: 0s; }
        .particle:nth-child(2) { left: 25%; animation-duration: 18s; animation-delay: 2s; }
        .particle:nth-child(3) { left: 40%; animation-duration: 15s; animation-delay: 4s; }
        .particle:nth-child(4) { left: 60%; animation-duration: 20s; animation-delay: 1s; }
        .particle:nth-child(5) { left: 75%; animation-duration: 16s; animation-delay: 3s; }
        .particle:nth-child(6) { left: 90%; animation-duration: 14s; animation-delay: 5s; }
        
        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) scale(1.5);
                opacity: 0;
            }
        }
        
        /* ============================
           Page Loading Animation
           ============================ */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientShift 3s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top-color: white;
            border-radius: 50%;
            animation: loaderSpin 1s linear infinite;
        }
        
        @keyframes loaderSpin {
            to { transform: rotate(360deg); }
        }
        
        /* ============================
           Enhanced Focus States
           ============================ */
        *:focus-visible {
            outline: 3px solid rgba(102, 126, 234, 0.8);
            outline-offset: 3px;
            border-radius: 4px;
        }
        
        .btn:focus-visible,
        .pill-link:focus-visible,
        .nav-links a:focus-visible {
            outline: 3px solid rgba(102, 126, 234, 1);
            outline-offset: 4px;
        }
        
        .feature-card:focus-visible {
            outline: 3px solid #667eea;
            outline-offset: 6px;
            transform: translateY(-10px);
        }
        
        /* ============================
           Scroll Progress Indicator
           ============================ */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #23a6d5);
            z-index: 9998;
            transition: width 0.1s ease;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.5);
        }
    </style>
</head>
    <footer class="site-footer" style="margin-top:40px; padding:20px; text-align:center; color:#e7ecf7; opacity:0.9;">
        <small>© <?php echo date('Y'); ?> Pie Menu Demo • <a href="home.php" style="color:#e7ecf7;">Home</a> • <a href="login.php" style="color:#e7ecf7;">Login</a> • <a href="register.php" style="color:#e7ecf7;">Register</a></small>
    </footer>
    
    <footer class="footer">
        <p>&copy; 2026 Pie Menu UI/UX Project. Crafted with innovation and care.</p>
        <div class="footer-links">
            <a href="home.php">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="#privacy">Privacy</a>
            <a href="#terms">Terms</a>
        </div>
        <p style="margin-top: 20px; font-size: 0.85rem;">Designed for elegant navigation experiences</p>
    </footer>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    
    <header class="top-nav">
        <div class="brand"><span class="brand-dot"></span>Pie Menu</div>
        <nav class="nav-links">
            <?php if (!empty($_SESSION['user_id'])): ?>
                <span class="pill-link">Hello, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User', ENT_QUOTES, 'UTF-8'); ?></span>
                <a href="home.php">Home</a>
                <a class="pill-link" href="logout.php">Logout</a>
            <?php else: ?>
                <a href="home.php">Home</a>
                <a class="pill-link" href="login.php">Login</a>
                <a class="pill-link" href="register.php">Register</a>
            <?php endif; ?>
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
    
    <footer class="footer">
        <p>&copy; 2026 Pie Menu UI/UX Project. Crafted with innovation and care.</p>
        <div class="footer-links">
            <a href="home.php">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="#privacy">Privacy</a>
            <a href="#terms">Terms</a>
        </div>
        <p style="margin-top: 20px; font-size: 0.85rem;">Designed for elegant navigation experiences</p>
    </footer>
    
    <script>
        // Page loader
        window.addEventListener('load', () => {
            const loader = document.querySelector('.page-loader');
            setTimeout(() => {
                loader.classList.add('hidden');
            }, 500);
        });
        
        // Scroll progress indicator
        const scrollProgress = document.querySelector('.scroll-progress');
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const progress = (scrollTop / scrollHeight) * 100;
            scrollProgress.style.width = progress + '%';
        });
        
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);
        
        // Observe all feature cards for scroll reveal
        document.querySelectorAll('.feature-card').forEach(card => {
            card.classList.add('scroll-reveal');
            observer.observe(card);
        });
        
        // Observe features section
        const featuresSection = document.querySelector('.features-section');
        if (featuresSection) {
            featuresSection.classList.add('scroll-reveal');
            observer.observe(featuresSection);
        }
    </script>
</body>
</html>
