// Animation légère au scroll pour les sections
window.addEventListener('DOMContentLoaded', () => {
  const revealSections = document.querySelectorAll('section');
  const revealOnScroll = () => {
    const triggerBottom = window.innerHeight * 0.92;
    revealSections.forEach(section => {
      const sectionTop = section.getBoundingClientRect().top;
      if(sectionTop < triggerBottom) {
        section.classList.add('visible');
      }
    });
  };
  window.addEventListener('scroll', revealOnScroll);
  revealOnScroll();

  // Feedback pour le formulaire de devis
  if(window.location.search.includes('sent=1')) {
    alert('Votre demande de devis a bien été envoyée. Merci !');
  }
  if(window.location.search.includes('error=1')) {
    alert('Erreur : veuillez vérifier les champs du formulaire.');
  }
});