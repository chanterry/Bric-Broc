const keyLocalStorage = 'TabPanier';

let btns = document.querySelectorAll('.btn-ajouter');

for (btnAjout of btns) {
  if (btnAjout) {
    btnAjout.addEventListener('click', ajoutPanier);
  }
}

function ajoutPanier() {
  let tabAjoutPanier;
  if (localStorage.getItem(keyLocalStorage) !== null) {
    tabAjoutPanier = window.localStorage.getItem(keyLocalStorage);
    tabAjoutPanier = JSON.parse(tabAjoutPanier);
  } else {
    tabAjoutPanier = [];
  }

  let contentBox = window.localStorage.getItem(bricbrocBox);

  if (tabAjoutPanier.length < contentBox) {

    //this représente l'élément sur le quel tu as cliqué
    let nameValeur = this.dataset.name;
    let descValeur = this.dataset.content;
    let imgValeur = this.dataset.img;
    tabAjoutPanier.push({ "title": nameValeur, "description": descValeur, "img": imgValeur });

    //transformation json
    //envoi dnas le storage
    localStorage.setItem(keyLocalStorage, JSON.stringify(tabAjoutPanier));

    if (tabAjoutPanier.length == contentBox) {
      window.confirm('Vous ne pouvez plus ajouter de produit. Vôtre box est complète!!');
      document.location.href = 'cart';
    }



  }
}

let contenuPanier = "";

function recupererPanier() {
  let contenu = document.getElementById('contenu');
  contenu.innerHTML = "";
  if (localStorage.getItem(keyLocalStorage) !== null) {
    let panier = window.localStorage.getItem(keyLocalStorage);

    panier = JSON.parse(panier);
    for (let i = 0; i < panier.length; i++) {
      let article = panier[i];

      contenuPanier += '<h5>' + article.title + '</h5>';
      contenuPanier += '<p>' + article.description + '</p>';
    }

    contenu.innerHTML = contenuPanier;
  }
}


const bricbrocBox = "bricbrocBox";
let typeBox = document.querySelectorAll(".box");

for (box of typeBox) {
  if (box) {
    box.addEventListener('click', chooseBox);
  }
}

function chooseBox(event) {
  let box = this.dataset.value;
  let href = this.dataset.href;
  localStorage.setItem(bricbrocBox, box);
  document.location.href = href;
}

