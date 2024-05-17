/* Liste des entrées (suggestions) de la barre de recherche */
const entries = [];

/* UI barre de recherche */
(function() {
  let found = entries;

  function update(value, search, noSuggestionsDisplay, list = document.querySelector('.searchbar-suggestions')) {
    if (!search || !noSuggestionsDisplay) return;

    found = entries.filter(x => x.value.toLowerCase().includes(value.toLowerCase()));

    if (value === '') list.replaceChildren();
    else {
      list.replaceChildren(...found.map(x => {
        let li = document.createElement('li');

        li.onclick = x.action;
        li.innerText = x.value;

        return li;
      }));
    }

    if (value !== '' && found.length === 0) {
      document.querySelector('.input-container').style.borderBottomLeftRadius = '.5em';
      document.querySelector('.input-container').style.borderBottomRightRadius = '.5em';

      noSuggestionsDisplay.style.display = 'block';
    }
    else if (value !== '' && found.length > 0) {
      document.querySelector('.input-container').style.borderBottomLeftRadius = '0';
      document.querySelector('.input-container').style.borderBottomRightRadius = '0';

      noSuggestionsDisplay.style.display = 'none';
    }
    else if (value === '') {
      document.querySelector('.input-container').style.borderBottomLeftRadius = '.5em';
      document.querySelector('.input-container').style.borderBottomRightRadius = '.5em';

      noSuggestionsDisplay.style.display = 'none';
    }
  }


  /**
   * TODO: placer la partie REST API dans le plugin
   * Quand le DOM (https://fr.wikipedia.org/wiki/Document_Object_Model#Aspects_techniques) est chargé, on commence à écouter les changements de valeur de la barre de recherche
   */
  window.addEventListener('DOMContentLoaded', event => {
    let search = document.getElementById('search'), noSuggestionsDisplay = document.querySelector('.no-suggestions');

    search
    .oninput = event => update(event.target.value, search, noSuggestionsDisplay);

    search.onblur = search.onfocus = event => update(search.value, search, noSuggestionsDisplay);
  });
})();
