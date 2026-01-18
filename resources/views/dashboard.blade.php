<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>archiv.me | Dashboard</title>
  <link rel="stylesheet" href="{{ asset('styles/styleProfile.css') }}">
</head>
<body>

<div class="box">
  <h2>Welcome, {{ auth()->user()->name ?? 'Guest' }}</h2>

  <div id="badgesPreview">
    @php
      $savedSkills = auth()->user()->skills ?? [];
    @endphp
    @foreach($savedSkills as $skill)
      <img src="{{ asset('imgsTemp/' . strtolower(str_replace([' ', '+'], ['-', 'p'], $skill)) . '.png') }}"
           alt="{{ $skill }}" width="48" height="48" style="margin-right:0.5rem;">
    @endforeach
  </div>

  <h3>Edit your skills:</h3>
  <form action="{{ url('/dashboard/save-skills') }}" method="POST">
    @csrf
    @php
      $allSkills = ['Python','JavaScript','HTML','CSS','C++','Java','touchGrass'];
    @endphp
    @foreach($allSkills as $skill)
      <label>
        <input type="checkbox" name="skills[]" value="{{ $skill }}"
          @if(in_array($skill, $savedSkills)) checked @endif>
        {{ $skill }}
      </label><br>
    @endforeach
    <button type="submit" style="margin-top:1rem;">Save Skills</button>
  </form>

  <button onclick="window.location.href='{{ url('/profile') }}'" style="margin-top:1rem;">Go to Profile</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("loaded");
});
</script>

</body>
</html>
