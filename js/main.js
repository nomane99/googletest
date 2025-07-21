// Animation légère au scroll pour les sections et éléments animés
window.addEventListener('DOMContentLoaded', () => {
  // Navbar mobile
  const navToggle = document.createElement('button');
  navToggle.className = 'nav-toggle';
  navToggle.innerHTML = '&#9776;';
  const navbar = document.querySelector('.navbar');
  const navLinks = document.querySelector('.nav-links');
  navbar.appendChild(navToggle);
  navToggle.addEventListener('click', () => {
    navLinks.classList.toggle('open');
  });

  // Fermer menu mobile au clic sur un lien
  navLinks.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      navLinks.classList.remove('open');
    });
  });

  // Animations au scroll
  const animatedEls = document.querySelectorAll('.fade-in, .fade-in-up');
  const revealOnScroll = () => {
    const triggerBottom = window.innerHeight * 0.92;
    animatedEls.forEach(el => {
      const elTop = el.getBoundingClientRect().top;
      if(elTop < triggerBottom) {
        el.style.animationDelay = el.getAttribute('style')?.match(/animation-delay:([\d.]+)s/)?.[1] + 's' || '';
        el.classList.add('visible');
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