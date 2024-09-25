function accordeon() {
  const accordeonBtn = document.querySelectorAll('[data-name="accordeon-title"]');

  accordeonBtn.forEach( function(button) {
    button.addEventListener('click', showContent);
  });

  function showContent(e) {
    e.preventDefault();
    this.nextElementSibling.classList.toggle('hidden');
    // const currentSection = this.textContent;  
    // window.sessionStorage.setItem('currentSection', currentSection);
  };

 
  
}

export default accordeon;