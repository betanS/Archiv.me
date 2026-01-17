<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>archiv.me | Register</title>
  <link rel="stylesheet" href="{{ asset('styles/form.css') }}">
</head>
<body>
  <div class="container">
    <h1 class="logo">archiv<span>.me</span></h1>
    <p class="subtitle">Create your archive account</p>

  <form method="POST" action="{{ url('/register') }}">
    @csrf
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Register</button>

  @if ($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
  @endif
</form>


  </div>


  <script>
  document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("loaded");
  });
</script>

</body>
</html>
