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
    <h2>Welcome, <span id="usernameDisplay"></span></h2>
    
    <div id="badgesPreview"></div>

    <h3>Edit your skills:</h3>
    <form action="{{ url('/profile') }}" method="POST">
      @csrf
      <label><input type="checkbox" name="skills[]" value="Python"> Python</label><br>
      <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label><br>
      <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label><br>
      <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label><br>
      <label><input type="checkbox" name="skills[]" value="C++"> C++</label><br>
      <label><input type="checkbox" name="skills[]" value="Java"> Java</label><br>
      <label><input type="checkbox" name="skills[]" value="touchGrass"> Touch Grass</label><br>
      <button type="submit" style="margin-top:1rem;">Go to Profile</button>
    </form>

    
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      document.body.classList.add("loaded");

      const currentUser = localStorage.getItem('currentUser');
      document.getElementById('usernameDisplay').textContent = currentUser || "Guest";

      const savedSkills =  [];
      const form = document.getElementById('skillForm');
      const badgesPreview = document.getElementById('badgesPreview');

      function renderBadges(skills) {
        badgesPreview.innerHTML = '';
        skills.forEach(skill => {
          const img = document.createElement('img');
          img.src = `imgsTemp/${skill.toLowerCase().replace(/\s+/g, '-').replace(/\+/g,'p')}.png`;
          img.alt = skill;
          img.width = 48;
          img.height = 48;
          img.style.marginRight = '0.5rem';
          badgesPreview.appendChild(img);
        });
      }

      renderBadges(savedSkills);

      // Marcar checkboxes según skills guardadas
      form.querySelectorAll('input[type="checkbox"]').forEach(cb => {
        if (savedSkills.includes(cb.value)) cb.checked = true;
      });

      // Guardar cambios
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        const selectedSkills = [];
        form.querySelectorAll('input[type="checkbox"]:checked').forEach(cb => {
          selectedSkills.push(cb.value);
        });

        localStorage.setItem(currentUser + '_skills', JSON.stringify(selectedSkills));
        renderBadges(selectedSkills);
        alert("Skills updated!");
      });

      // Botón "Go to Profile"
      document.getElementById('goProfile').addEventListener('click', () => {
        window.location.href = "profile.html";
      });
    });
  </script>
</body>
</html>
