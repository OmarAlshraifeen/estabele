<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hooss Riding Reservations - Register</title>
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
        
        .register-title {
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
        
        .register-form {
            background-color: rgba(255, 248, 240, 0.95);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .form-label {
            display: block;
            font-size: 1.5rem;
            color: #a68a56;
            margin-bottom: 10px;
            text-align: left;
        }
        
        .form-input {
            width: 100%;
            padding: 15px;
            font-size: 1.2rem;
            border: 1px solid #d4c4a8;
            border-radius: 8px;
            background-color: #fff;
            color: #666;
        }
        
        .error-message {
            color: #c75f5f;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .register-button {
            width: 100%;
            padding: 15px;
            font-size: 1.5rem;
            background-color: #a68a56;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        
        .register-button:hover {
            background-color: #8c7346;
        }
        
        .form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
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
        <h1 class="register-title">REGISTER</h1>
        <h2 class="subtitle">Hooss Riding Reservations</h2>
        
        <form class="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <input class="form-input" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @if ($errors->get('name'))
                    <div class="error-message">
                        @foreach ($errors->get('name') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @if ($errors->get('email'))
                    <div class="error-message">
                        @foreach ($errors->get('email') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-input" id="password" type="password" name="password" required autocomplete="new-password">
                @if ($errors->get('password'))
                    <div class="error-message">
                        @foreach ($errors->get('password') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->get('password_confirmation'))
                    <div class="error-message">
                        @foreach ($errors->get('password_confirmation') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <button class="register-button" type="submit">Register</button>
            
            <div class="form-footer">
                <a href="{{ route('login') }}">Already registered?</a>
            </div>
        </form>
    </div>
</body>
</html>