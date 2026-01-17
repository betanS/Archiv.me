<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>archiv.me | Login</title>
  <link rel="stylesheet" href="{{ asset('styles/form.css') }}">

</head>
<body>
  <div class="container">
    <h1 class="logo">archiv<span>.me</span></h1>
    <p class="subtitle">Login to your archive account</p>
    <form method="POST" action="{{ url('/login') }}">
      @csrf
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    </form>
  </div>
  <script>
document.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add("loaded");
});
</script>

</body>
</html>
