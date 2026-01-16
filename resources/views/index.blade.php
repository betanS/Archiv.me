<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>archiv.me | Welcome</title>
  <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
</head>

<body>
  <div class="container">
    <h1 class="logo">archiv<span>.me</span></h1>
    <p class="subtitle">Your digital archive of useless (or not so useless) achievements.</p>

<div class="buttons">
  <a href="{{ url('/login') }}"><button>Login</button></a>
  <a href="{{ url('/register') }}"><button>Register</button></a>
</div>

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      document.body.classList.add("loaded");
    });
  </script>
</body>
</html>
