<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>archiv.me | Profile</title>
  <link rel="stylesheet" href="{{ asset('styles/styleProfile.css') }}">
</head>
<body>
<div class="box">
  <div id="icon"></div>
  <div id="Name">{{ $user->name }}</div>
  <div id="Bio">Full-stack dev. Collector of useless achievements.</div>

  <div id="Badges">
    @php
      $skills = $user->skills ?? [];
    @endphp
    @foreach($skills as $skill)
      <div class="badge" data-skill="{{ $skill }}">
        <img src="{{ asset('imgsTemp/' . strtolower(str_replace([' ', '+'], ['-', 'p'], $skill)) . '.png') }}"
             alt="{{ $skill }}" width="48" height="48">
      </div>
    @endforeach
  </div>

  <!-- Modal oculto para mostrar info de skill -->
  <div id="modal" class="hidden">
    <div class="modal-content">
      <span id="closeBtn">&times;</span>
      <h2 id="skillName"></h2>
      <p id="skillDescription"></p>
      <div class="skill-level">
        <span>Level:</span>
        <div class="bar">
          <div id="skillBar"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('scripts/scriptprofile.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add("loaded");
});
</script>
</body>
</html>
