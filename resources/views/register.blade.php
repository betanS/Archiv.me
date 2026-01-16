<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>archiv.me | Register</title>
  <link rel="stylesheet" href="styles/form.css">
</head>
<body>
  <div class="container">
    <h1 class="logo">archiv<span>.me</span></h1>
    <p class="subtitle">Create your archive account</p>

    <form action="{{ url('/dashboard') }}" method="get">
      <input type="text" id="username" placeholder="Username"/>
      <input type="password" id="password" placeholder="Password"/>
      <input type="password" id="confirmPassword" placeholder="Confirm Password"/>
      <button type="submit">Register</button>
      <p class="redirect">Already have an account? <a href="login.html">Login</a></p>
    </form>
  </div>


  <script>
  document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("loaded");
  });
</script>

</body>
</html>
