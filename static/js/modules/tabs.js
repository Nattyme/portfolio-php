function tabs() {
  const tabs = document.querySelectorAll('[data-control="tab"]');

  tabs.forEach( function (tab) {
    const tabButtons = tab.querySelectorAll('[data-control="tab-button"]');
    const tabBlocks = tab.querySelectorAll('[data-control="tab-block"]');

    tabButtons.forEach( function(currentButton, index) {
      currentButton.addEventListener('click', function () {
        const contentBlocks = tab.querySelectorAll('[data-control="tab-block"]');
        const currentBlock = contentBlocks[index];
        console.log(currentBlock);

        // Если кликнули по активной кнопке
        if ( !currentButton.classList.contains('active')) {
          
          // Снимаем активный класс со всех кнопок
          tabButtons.forEach( function(currentButton) {
            currentButton.classList.remove('active');
          })

          // Снимаем активный класс со всех блоков
          tabBlocks.forEach( function(currentBlock) {
            currentBlock.classList.remove('active');
          })

          // Добавляем активный класс к кнопке, по которой кликнули
          currentButton.classList.add('active');

          // Добавляем активный класс к блоку, по который относится к кнопке
          currentBlock.classList.add('active');
        }

      });
    });
  })
}

export default tabs;