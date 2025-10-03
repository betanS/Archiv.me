document.addEventListener('DOMContentLoaded', () => {

  // Datos de skills
  const skills = {
    Python: {
      description: "Can write scripts, manage data and build apps with Python.",
      level: "High"
    },
    HTML: {
      description: "Can craft semantic layouts and structure web content.",
      level: "High"
    },
    CSS: {
      description: "Knows how to style interfaces and center a div (sometimes).",
      level: "Medium"
    },
    JavaScript: {
      description: "Builds dynamic websites and manipulates the DOM with ease.",
      level: "Medium"
    },
    "C++": {
      description: "Understands memory management and object-oriented programming.",
      level: "Medium"
    },
    Java: {
      description: "Can develop backend applications and understand OOP principles.",
      level: "Medium"
    },
    touchGrass: { 
      description: "Survived physical contact with grass..", 
      level: "Low" 
    }
  };

  const skillForm = document.getElementById('skillForm');
  const badgesContainer = document.getElementById('Badges');

  // Mapa para nombres de archivos de imagen (asegura coincidencia con los iconos)
  function getFileNameForSkill(skill){
    const map = {
      "C++": "c++",
      "JavaScript": "javascript",
      "HTML": "html",
      "CSS": "css",
      "Python": "python",
      "Java": "java"
    };
    return map[skill] || skill.toLowerCase().replace(/\s+/g, '-').replace(/\+/g, 'p');
  }

  // Convierte nivel a porcentaje
  function levelToPercent(level) {
    switch (level) {
      case "Low": return 33;
      case "Medium": return 66;
      case "High": return 100;
      default: return 0;
    }
  }

  // Generar badges desde el form
  skillForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const selected = Array.from(document.querySelectorAll('input[name="skill"]:checked'))
                          .map(i => i.value);

    badgesContainer.innerHTML = ''; // limpia

    let counter = 0;
    selected.forEach(skill => {
      const badge = document.createElement('div');
      badge.className = 'badge';
      badge.setAttribute('data-skill', skill);

      const img = document.createElement('img');
      img.src = `imgsTemp/${getFileNameForSkill(skill)}.png`;
      img.alt = skill;
      img.width = 48;
      img.height = 48;
      img.style.objectFit = 'contain';

      badge.appendChild(img);
      badgesContainer.appendChild(badge);

      counter++;
    });

    // Ocultar formulario
    skillForm.style.display = 'none';
  });

  /* ---------- Delegación de eventos: escucha clicks en contenedor ---------- */
  const modal = document.getElementById('modal');
  const closeBtn = document.getElementById('closeBtn');
  const skillName = document.getElementById('skillName');
  const skillDescription = document.getElementById('skillDescription');
  const skillBar = document.getElementById('skillBar');

  badgesContainer.addEventListener('click', (e) => {
    const badge = e.target.closest('.badge');
    if (!badge) return;

    const skill = badge.getAttribute('data-skill');
    openSkillModal(skill);
  });

  // Abrir modal rellenando datos
  function openSkillModal(skill) {
    const data = skills[skill] || { description: "No description available.", level: "Low" };
    skillName.textContent = skill;
    skillDescription.textContent = data.description;

    // animar barra
    skillBar.style.width = '0%';
    setTimeout(() => {
      skillBar.style.width = `${levelToPercent(data.level)}%`;
    }, 50);

    modal.classList.remove('hidden');
  }

  // Cerrar modal
  closeBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
  });

  // cerrar si clicas fuera del contenido modal
  modal.addEventListener('click', (e) => {
    if (e.target === modal) modal.classList.add('hidden');
  });

});
