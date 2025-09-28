window.addEventListener('DOMContentLoaded', () => {
  const archs = document.querySelectorAll('#ArchList .arch');

  archs.forEach((arch, index) => {
    arch.style.opacity = '0';
    arch.style.transform = 'translateY(20px)';
    arch.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';

    setTimeout(() => {
      arch.style.opacity = '1';
      arch.style.transform = 'translateY(0)';
    }, index * 200); //  200ms delay entre cada animación   
  });
});
/* Animación de aparición de logros */  