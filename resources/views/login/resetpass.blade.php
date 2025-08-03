<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Password</title>
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
            overflow-x: hidden;
            position: relative;
            padding: 20px;
        }

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
        .shape:nth-child(1) { width: 80px; height: 80px; top: 20%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { width: 120px; height: 120px; top: 60%; right: 10%; animation-delay: 2s; }
        .shape:nth-child(3) { width: 60px; height: 60px; bottom: 20%; left: 15%; animation-delay: 4s; }
        .shape:nth-child(4) { width: 100px; height: 100px; top: 10%; right: 20%; animation-delay: 1s; }
        .shape:nth-child(5) { width: 40px; height: 40px; top: 50%; left: 5%; animation-delay: 3s; }

        .back-button {
            position: fixed;
            top: 30px;
            left: 30px;
            z-index: 1000;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 0;
            opacity: 0;
            animation: slideInLeft 0.8s ease-out 0.3s forwards;
            transition: transform 0.3s ease;
        }

        .back-button::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #00bcd4, #26c6da);
            transition: width 0.4s ease;
        }

        .back-button:hover::after { width: 100%; }
        .back-button:hover { transform: translateX(-5px); }
        .back-icon { transition: transform 0.3s ease; }
        .back-button:hover .back-icon { transform: translateX(-3px); }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 980px; /* Lebar maksimal untuk desktop */
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.2);
            opacity: 0;
            animation: slideUp 0.8s ease-out 0.5s forwards;
        }

        .main-content {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .main-content > .header, .main-content > .form {
            flex: 1;
        }

        .header { text-align: left; }
        .icon-container { margin-bottom: 20px; opacity: 0; animation: scaleIn 0.6s ease-out 0.8s forwards; }
        .lock-icon { width: 80px; height: 80px; margin: 0; animation: pulse 2s ease-in-out infinite; }
        .title { font-family: 'Space Grotesk', sans-serif; font-size: 2.5rem; font-weight: 700; color: #2c3e50; margin-bottom: 12px; opacity: 0; animation: slideUp 0.6s ease-out 1s forwards; }
        .subtitle { color: #64748b; font-size: 1rem; line-height: 1.5; opacity: 0; animation: slideUp 0.6s ease-out 1.2s forwards; }

        .form { width: 100%; }
        .form-group { margin-bottom: 20px; opacity: 0; animation: slideUp 0.6s ease-out forwards; }
        .form-group:nth-child(1) { animation-delay: 1.4s; }
        .form-group:nth-child(2) { animation-delay: 1.6s; }
        .form-group:nth-child(3) { animation-delay: 1.8s; }
        .form-group:nth-child(4) { animation-delay: 2s; }
        .form-label { display: block; margin-bottom: 8px; font-weight: 600; color: #374151; font-size: 0.95rem; }
        .form-input { width: 100%; padding: 16px 20px; border: 2px solid #e5e7eb; border-radius: 15px; font-size: 1rem; background: #f9fafb; transition: all 0.3s ease; position: relative; }
        .form-input:focus { outline: none; border-color: #00bcd4; background: white; box-shadow: 0 0 0 4px rgba(0, 188, 212, 0.1); transform: translateY(-2px); }
        .form-input:valid:not(:placeholder-shown) { border-color: #10b981; background: #f0fdf4; }
        .form-input::placeholder { color: #9ca3af; }

        .input-group { position: relative; }
        .input-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #9ca3af; transition: color 0.3s ease; pointer-events: none; }
        .input-group .form-input { padding-left: 50px; }
        .input-group .form-input:focus + .input-icon { color: #00bcd4; }

        .password-strength { margin-top: 8px; height: 4px; background: #e5e7eb; border-radius: 2px; overflow: hidden; opacity: 0; transition: opacity 0.3s ease; }
        .password-strength.visible { opacity: 1; }
        .strength-fill { height: 100%; width: 0%; transition: all 0.3s ease; border-radius: 2px; }
        .strength-weak { background: #ef4444; width: 25%; }
        .strength-fair { background: #f59e0b; width: 50%; }
        .strength-good { background: #10b981; width: 75%; }
        .strength-strong { background: #059669; width: 100%; }

        .submit-btn { width: 100%; padding: 16px; background: linear-gradient(135deg, #00bcd4, #26c6da); color: white; border: none; border-radius: 15px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; margin-top: 10px; opacity: 0; animation: slideUp 0.6s ease-out 2.2s forwards; display: flex; align-items: center; justify-content: center; }
        .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0, 188, 212, 0.4); }
        .submit-btn:active { transform: translateY(0); }
        .submit-btn::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent); transition: left 0.5s; }
        .submit-btn:hover::before { left: 100%; }
        .submit-btn:disabled { opacity: 0.7; cursor: not-allowed; transform: none; box-shadow: none; }

        .loading { display: none; width: 20px; height: 20px; border: 2px solid rgba(255, 255, 255, 0.3); border-radius: 50%; border-top-color: white; animation: spin 1s linear infinite; margin-right: 8px; }
        .submit-btn.loading .loading { display: inline-block; }
        .submit-btn.loading .btn-text { opacity: 0.7; }

        .message { padding: 16px 20px; border-radius: 15px; margin-top: 20px; text-align: center; font-weight: 500; display: none; animation: slideUp 0.4s ease-out; }
        .message.show { display: block; }
        .success-message { background: linear-gradient(135deg, #10b981, #059669); color: white; }
        .error-message { background: linear-gradient(135deg, #ef4444, #dc2626); color: white; }

        .footer-link { text-align: center; margin-top: 25px; opacity: 0; animation: fadeIn 0.6s ease-out 2.4s forwards; }
        .footer-link a { color: #00bcd4; text-decoration: none; font-weight: 500; transition: color 0.3s ease; }
        .footer-link a:hover { color: #0097a7; text-decoration: underline; }

        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        @keyframes slideInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes scaleIn { from { opacity: 0; transform: scale(0.8); } to { opacity: 1; transform: scale(1); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        @keyframes fadeOut { from { opacity: 1; transform: translateY(0); } to { opacity: 0; transform: translateY(-10px); } }

        .particle { position: absolute; width: 4px; height: 4px; background: rgba(255, 255, 255, 0.6); border-radius: 50%; pointer-events: none; animation: particleFloat 8s linear infinite; }
        @keyframes particleFloat { 0% { transform: translateY(100vh) scale(0); opacity: 0; } 10% { opacity: 1; } 90% { opacity: 1; } 100% { transform: translateY(-10vh) scale(1); opacity: 0; } }

        @media (max-width: 992px) {
            .main-content {
                flex-direction: column;
                gap: 40px;
                align-items: stretch;
            }
            .container {
                max-width: 480px;
                padding: 50px 40px;
                margin-top: 80px;
                margin-bottom: 40px;
            }
            .header {
                text-align: center;
                margin-bottom: 0;
            }
            .lock-icon {
                margin: 0 auto;
            }
            .back-button {
                top: 20px;
                left: 20px;
            }
            .title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 40px 25px;
            }
            .title {
                font-size: 1.8rem;
            }
            .subtitle {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-shapes"></div>

    <a href="#" class="back-button" onclick="history.back(); return false;">
        <svg class="back-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Kembali ke Login
    </a>

    <div class="container">
        <div class="main-content">
            <div class="header">
                <div class="icon-container">
                    <svg class="lock-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <rect x="30" y="45" width="40" height="35" rx="5" fill="url(#lockGradient)" stroke="#00bcd4" stroke-width="2"/>
                        <path d="M 40 45 L 40 30 Q 40 20 50 20 Q 60 20 60 30 L 60 45" fill="none" stroke="#00bcd4" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="50" cy="57" r="4" fill="#ffffff"/>
                        <rect x="48" y="61" width="4" height="8" fill="#ffffff" rx="2"/>
                        <ellipse cx="45" cy="52" rx="3" ry="8" fill="rgba(255,255,255,0.3)" opacity="0.8"/>
                        <g transform="translate(65, 25)">
                            <path d="M 0 0 A 8 8 0 1 1 0 16 A 8 8 0 1 1 0 0" fill="none" stroke="#4caf50" stroke-width="2"/>
                            <path d="M -3 8 L 0 5 L 3 8" fill="none" stroke="#4caf50" stroke-width="2" stroke-linecap="round"/>
                            <animateTransform attributeName="transform" type="rotate" values="0 8 8;360 8 8;0 8 8" dur="3s" repeatCount="indefinite"/>
                        </g>
                        <defs>
                            <linearGradient id="lockGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#e0f7fa"/>
                                <stop offset="100%" stop-color="#b2ebf2"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <h1 class="title">Atur Ulang Password Anda</h1>
                <p class="subtitle">Silahkan isi info pribadi di bawah ini untuk mereset password.</p>
            </div>
    
            <form method="POST" action="{{ route('lupapassword') }}" class="form" id="resetForm">
                @csrf

                @if($errors->any())
                    <div style="color: red; background: #ffdddd; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if(session('success'))
                    <div style="color: green; background: #ddffdd; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label class="form-label" for="fullName">Nama Lengkap</label>
                    <div class="input-group">
                        <input type="text" id="fullName" class="form-input" placeholder="Masukkan nama lengkap Anda" name="nama" value="{{ old('nama') }}" required>
                        <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                </div>
    
                <div class="form-group">
                    <label class="form-label" for="nis">NIS (Nomor Induk Siswa)</label>
                    <div class="input-group">
                        <input type="text" id="nis" class="form-input" placeholder="Masukkan NIS Anda" name="nis" value="{{ old('nis') }}" required>
                        <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10,9 9,9 8,9"/></svg>
                    </div>
                </div>
    
                <div class="form-group">
                    <label class="form-label" for="newPassword">Password Baru</label>
                    <div class="input-group">
                        <input type="password" id="newPassword" class="form-input" placeholder="Buat password yang kuat" name="password" required>
                        <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><circle cx="12" cy="16" r="1"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                </div>
    
                <div class="form-group">
                    <label class="form-label" for="confirmPassword">Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" id="confirmPassword" class="form-input" placeholder="Konfirmasi password Anda" name="password_confirmation" required>
                        <svg class="input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><circle cx="12" cy="16" r="1"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                </div>
    
                <button type="submit" class="submit-btn" id="submitBtn">
                    <div class="loading"></div>
                    <span class="btn-text">Atur Ulang Password</span>
                </button>
                
                <div id="messageContainer"></div>
    
                <div class="footer-link">
                    <a href="login">Ingat password Anda? Masuk</a>
                </div>
            </form>
        </div>
    </div>

    @vite('resources/js/lupapass.js')
</body>
</html>