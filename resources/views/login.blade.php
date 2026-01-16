<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>archiv.me | Login</title>
  <link rel="stylesheet" href="styles/form.css">
</head>
<body>
  <div class="container">
    <h1 class="logo">archiv<span>.me</span></h1>
    <p class="subtitle">Login to your archive account</p>

    <form action="{{ url('/dashboard') }}" method="get">
      <input type="text" id="username" placeholder="Username"/>
      <input type="password" id="password" placeholder="Password"/>
      <button type="submit">Login</button>
      <p class="redirect">Don't have an account? <a href="register.html">Register</a></p>
    </form>
  </div>

  
</body>
</html>
