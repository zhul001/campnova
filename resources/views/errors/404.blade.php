<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
        }
        
        .error-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-width: 800px;
            width: 100%;
        }
        
        .animation-container {
            width: 100%;
            max-width: 600px;
            margin-bottom: 2rem;
        }
        
        .error-code {
            font-size: 5rem;
            font-weight: 800;
            color: #0ea5e9;
            margin-bottom: 0.5rem;
        }
        
        .error-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #334155;
        }
        
        .error-description {
            color: #64748b;
            margin-bottom: 2.5rem;
            max-width: 500px;
            line-height: 1.6;
        }
        
        .back-button {
            background-color: #b9e4f4;
            color: #0c4a6e;
            border: none;
            border-radius: 0.75rem;
            padding: 1rem 2.5rem;
            font-weight: 600;
            font-size: 1.125rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .back-button:hover {
            background-color: #a0d3e9;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        
        .back-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        @media (max-width: 768px) {
            .error-code {
                font-size: 4rem;
            }
            
            .error-title {
                font-size: 1.75rem;
            }
            
            .animation-container {
                max-width: 400px;
            }
        }
        
        @media (max-width: 480px) {
            .error-code {
                font-size: 3rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .animation-container {
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="animation-container">
            <lottie-player 
                src="animations/binocular-404-error.json" 
                background="transparent" 
                speed="1" 
                loop 
                autoplay>
            </lottie-player>
        </div>
 
        <p class="error-description">
            Halaman yang Anda cari tidak tersedia atau tidak ditemukan. 
            Silakan kembali ke halaman sebelumnya.
        </p>
        <button class="back-button" onclick="window.history.back();">
            Kembali
        </button>
    </div>
</body>
</html>