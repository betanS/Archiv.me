
 //Animación de aparición de logros 
 // Datos de las skills
document.addEventListener("DOMContentLoaded", () => {

  //Habilitie data
const skills = {
  Python: {
    description: "Can write scripts, manage data and build apps with Python.",
    level: "High"
  },
  JavaScript: {
    description: "Knows how to break websites with console.log().",
    level: "Medium"
  },
  HTML5: {
    description: "Can craft semantic layouts and structure web content.",
    level: "High"
  },
  CSS3: {
    description: "Knows how to center a div (sometimes).",
    level: "Medium"
  },
  touchAlady: {
    description: "Survived physical contact with a lady..",
    level: "Low"
  },
  touchGrass: {
    description: "Survived physical contact with grass..",
    level: "Low"
  }
};


//Porcentaje lvl
function levelToPercent(level) {
  switch (level) {
    case "Low": return 33;
    case "Medium": return 66;
    case "High": return 100;
    default: return 0;
  }
}

//Abrir modal con los datos
const modal = document.getElementById("modal");
const closeBtn = document.getElementById("closeBtn");

const skillName = document.getElementById("skillName");
const skillDescription = document.getElementById("skillDescription");
const skillBar = document.getElementById("skillBar");

document.querySelectorAll(".badge").forEach(badge => {
  badge.addEventListener("click", () => {
    const skill = badge.getAttribute("data-skill");
    const { description, level } = skills[skill];

    // Insertar datos en el modal
    skillName.textContent = skill;
    skillDescription.textContent = description;

    // Reinicia barra y luego anima al valor
    skillBar.style.width = "0%";
    setTimeout(() => {
      skillBar.style.width = `${levelToPercent(level)}%`;
    }, 100);

    // Mostrar modal
    modal.classList.remove("hidden");
  });
});

closeBtn.addEventListener("click", () => {
  modal.classList.add("hidden");
});

});
