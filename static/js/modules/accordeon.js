function accordeon() {
  const accordeonBtn = document.querySelectorAll('[data-name="accordeon-title"]');

  accordeonBtn.forEach( function(button) {
    button.addEventListener('click', showContent);
  });

  function showContent(e) {
    this.nextElementSibling.classList.toggle('hidden');
  };
 
  
}

export default accordeon;