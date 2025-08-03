<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Animated background elements */
        .bg-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 80%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 70%;
            animation-delay: 1s;
        }

        .container {
            text-align: center;
            color: white;
            z-index: 10;
            position: relative;
            max-width: 800px;
            padding: 40px 20px;
        }

        .error-code {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(8rem, 15vw, 12rem);
            font-weight: 800;
            line-height: 0.8;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ffffff, #f0f9ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 20px rgba(255, 255, 255, 0.3);
            animation: glow 2s ease-in-out infinite alternate;
        }

        .error-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 600;
            margin-bottom: 16px;
            opacity: 0;
            animation: slideUp 0.8s ease-out 0.5s forwards;
        }

        .error-message {
            font-size: clamp(1.1rem, 2vw, 1.25rem);
            font-weight: 400;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            animation: slideUp 0.8s ease-out 0.7s forwards;
        }

        .svg-container {
            margin: 40px 0;
            opacity: 0;
            animation: slideUp 0.8s ease-out 0.3s forwards;
        }

        .astronaut-svg {
            max-width: 300px;
            width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.2));
        }

        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: slideUp 0.8s ease-out 0.9s forwards;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border: none;
            border-radius: 50px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #00bcd4, #26c6da);
            color: white;
            box-shadow: 0 6px 20px rgba(0, 188, 212, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 188, 212, 0.5);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        /* Floating animation for the astronaut */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes glow {
            from { text-shadow: 0 4px 20px rgba(255, 255, 255, 0.3); }
            to { text-shadow: 0 4px 30px rgba(255, 255, 255, 0.6); }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            .buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 250px;
                justify-content: center;
            }

            .astronaut-svg {
                max-width: 250px;
            }
        }

        @media (max-width: 480px) {
            .error-message {
                font-size: 1rem;
            }

            .astronaut-svg {
                max-width: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <h1 class="error-code">404</h1>
        
        <div class="svg-container">
            <svg class="astronaut-svg floating" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                <!-- Stars -->
                <circle cx="50" cy="80" r="2" fill="#ffffff" opacity="0.8">
                    <animate attributeName="opacity" values="0.8;0.3;0.8" dur="2s" repeatCount="indefinite"/>
                </circle>
                <circle cx="350" cy="120" r="1.5" fill="#ffffff" opacity="0.6">
                    <animate attributeName="opacity" values="0.6;0.2;0.6" dur="3s" repeatCount="indefinite"/>
                </circle>
                <circle cx="80" cy="300" r="1" fill="#ffffff" opacity="0.7">
                    <animate attributeName="opacity" values="0.7;0.3;0.7" dur="2.5s" repeatCount="indefinite"/>
                </circle>
                <circle cx="320" cy="290" r="2" fill="#ffffff" opacity="0.5">
                    <animate attributeName="opacity" values="0.5;0.2;0.5" dur="1.8s" repeatCount="indefinite"/>
                </circle>

                <!-- Planet in background -->
                <circle cx="320" cy="100" r="40" fill="url(#planetGradient)" opacity="0.7"/>
                <circle cx="330" cy="90" r="8" fill="rgba(255,255,255,0.3)"/>
                <circle cx="315" cy="110" r="5" fill="rgba(255,255,255,0.2)"/>
                
                <!-- Astronaut -->
                <g transform="translate(150, 150)">
                    <!-- Jetpack flames -->
                    <ellipse cx="20" cy="70" rx="5" ry="15" fill="#ff6b35" opacity="0.8">
                        <animate attributeName="ry" values="15;25;15" dur="0.5s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="0.8;0.4;0.8" dur="0.5s" repeatCount="indefinite"/>
                    </ellipse>
                    <ellipse cx="80" cy="70" rx="5" ry="15" fill="#ff6b35" opacity="0.8">
                        <animate attributeName="ry" values="15;25;15" dur="0.5s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="0.8;0.4;0.8" dur="0.5s" repeatCount="indefinite"/>
                    </ellipse>
                    
                    <!-- Astronaut body -->
                    <ellipse cx="50" cy="60" rx="35" ry="45" fill="#f8f9fa" stroke="#e9ecef" stroke-width="2"/>
                    
                    <!-- Arms -->
                    <ellipse cx="15" cy="45" rx="12" ry="25" fill="#f8f9fa" stroke="#e9ecef" stroke-width="2" transform="rotate(-20 15 45)"/>
                    <ellipse cx="85" cy="45" rx="12" ry="25" fill="#f8f9fa" stroke="#e9ecef" stroke-width="2" transform="rotate(20 85 45)"/>
                    
                    <!-- Legs -->
                    <ellipse cx="35" cy="100" rx="10" ry="25" fill="#f8f9fa" stroke="#e9ecef" stroke-width="2"/>
                    <ellipse cx="65" cy="100" rx="10" ry="25" fill="#f8f9fa" stroke="#e9ecef" stroke-width="2"/>
                    
                    <!-- Helmet -->
                    <circle cx="50" cy="25" r="28" fill="rgba(135,206,235,0.3)" stroke="#87ceeb" stroke-width="3"/>
                    <circle cx="50" cy="25" r="22" fill="rgba(255,255,255,0.1)"/>
                    
                    <!-- Face -->
                    <circle cx="42" cy="22" r="3" fill="#333"/>
                    <circle cx="58" cy="22" r="3" fill="#333"/>
                    <ellipse cx="50" cy="30" rx="4" ry="2" fill="#ff6b6b"/>
                    
                    <!-- Helmet reflection -->
                    <ellipse cx="40" cy="15" rx="8" ry="12" fill="rgba(255,255,255,0.4)" opacity="0.6"/>
                    
                    <!-- Control panel -->
                    <rect x="40" y="50" width="20" height="15" fill="#4a90e2" rx="3"/>
                    <circle cx="45" cy="57" r="2" fill="#ff6b35"/>
                    <circle cx="55" cy="57" r="2" fill="#4caf50"/>
                    <rect x="42" y="62" width="16" height="2" fill="#333" opacity="0.3"/>
                    
                    <!-- Jetpack -->
                    <rect x="15" y="45" width="15" height="30" fill="#666" rx="7"/>
                    <rect x="70" y="45" width="15" height="30" fill="#666" rx="7"/>
                    <rect x="42" y="48" width="16" height="25" fill="#555" rx="3"/>
                </g>

                <!-- Floating objects -->
                <rect x="100" y="50" width="8" height="8" fill="#ff9800" opacity="0.8" transform="rotate(45 104 54)">
                    <animateTransform attributeName="transform" type="rotate" values="45 104 54;405 104 54;45 104 54" dur="4s" repeatCount="indefinite"/>
                </rect>
                
                <circle cx="300" cy="200" r="6" fill="#e91e63" opacity="0.7">
                    <animateTransform attributeName="transform" type="translate" values="0,0;-20,-10;0,0" dur="3s" repeatCount="indefinite"/>
                </circle>

                <!-- Gradients -->
                <defs>
                    <radialGradient id="planetGradient" cx="0.3" cy="0.3">
                        <stop offset="0%" stop-color="#ff9800"/>
                        <stop offset="100%" stop-color="#e65100"/>
                    </radialGradient>
                </defs>
            </svg>
        </div>

        <h2 class="error-title">Oops! Halaman tidak ditemukan.</h2>
        <p class="error-message">
        Laman yang anda cari tidak ada!
    </p>

        <div class="buttons">
            <a href="/" class="btn btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9,22 9,12 15,12 15,22"/>
                </svg>
                Go Home
            </a>
            <button onclick="history.back()" class="btn btn-secondary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Go Back
            </button>
        </div>
    </div>

    <script>
        // Add some interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            function createParticle() {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: absolute;
                    width: 4px;
                    height: 4px;
                    background: rgba(255, 255, 255, 0.6);
                    border-radius: 50%;
                    pointer-events: none;
                    animation: particleFloat 8s linear infinite;
                `;
                
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 8 + 's';
                
                document.querySelector('.bg-shapes').appendChild(particle);
                
                setTimeout(() => {
                    particle.remove();
                }, 8000);
            }

            // Create particles periodically
            setInterval(createParticle, 2000);

            // Add particle animation CSS
            const style = document.createElement('style');
            style.textContent = `
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
                        transform: translateY(-10vh) scale(1);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });

        // Add mouse movement effect
        document.addEventListener('mousemove', function(e) {
            const astronaut = document.querySelector('.astronaut-svg');
            const rect = astronaut.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            const deltaX = (e.clientX - centerX) * 0.01;
            const deltaY = (e.clientY - centerY) * 0.01;
            
            astronaut.style.transform = `translate(${deltaX}px, ${deltaY}px)`;
        });
    </script>
</body>
</html>