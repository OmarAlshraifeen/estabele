<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hooss Riding Reservations - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', serif;
        }
        
        body {
            height: 100vh;
            background-image: url('/api/placeholder/800/600');
            background-size: cover;
            background-position: center;
            background-color: #1a1209;
            color: #e8cba7;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            padding: 0 20px;
            text-align: center;
            z-index: 2;
        }
        
        .login-title {
            font-size: 5rem;
            font-weight: normal;
            margin-bottom: 10px;
            color: #e8cba7;
            letter-spacing: 5px;
        }
        
        .subtitle {
            font-size: 2rem;
            font-weight: normal;
            margin-bottom: 40px;
            color: #fff;
        }
        
        .login-form {
            background-color: rgba(255, 248, 240, 0.95);
            border-radius: 20px;
            padding: 40px;
            max-width: 450px;
            margin: 0 auto;
        }
        
        .form-label {
            display: block;
            font-size: 2rem;
            color: #a68a56;
            margin-bottom: 20px;
            text-align: left;
        }
        
        .form-input {
            width: 100%;
            padding: 15px;
            font-size: 1.2rem;
            border: 1px solid #d4c4a8;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #fff;
            color: #666;
        }
        
        .login-button {
            width: 100%;
            padding: 15px;
            font-size: 1.5rem;
            background-color: #a68a56;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }
        
        .login-button:hover {
            background-color: #8c7346;
        }
        
        .form-footer {
            display: flex;
            justify-content: space-between;
            font-size: 1.2rem;
            color: #a68a56;
        }
        
        .form-footer a {
            color: #a68a56;
            text-decoration: none;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="login-title">LOGIN</h1>
        <h2 class="subtitle">Hooss Riding Reservations</h2>
        
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            
            <label class="form-label" for="email">Email Address</label>
            <input class="form-input" id="email" type="email" name="email" required autofocus autocomplete="username">
            
            <input class="form-input" id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">
            
            <button class="login-button" type="submit">Login</button>
            
            <div class="form-footer">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                <a href="{{ route('password.request') }}">Forgot?</a>
            </div>
        </form>
    </div>
</body>
</html>