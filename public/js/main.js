const keyLocalStorage = 'TabPanier';

let btns = document.querySelectorAll('.btn-ajouter');

for (btn of btns) {
  if (btn) {
    btn.addEventListener('click', ajoutPanier);
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

  //this représente l'élément sur le quel tu as cliqué
  let nameValeur = this.dataset.name;
  let descValeur = this.dataset.content;
  let imgValeur = this.dataset.img;
  tabAjoutPanier.push({ "title": nameValeur, "description": descValeur, "img": imgValeur });

  //transformation json
  //envoi dnas le storage
  localStorage.setItem(keyLocalStorage, JSON.stringify(tabAjoutPanier));

}

let contenuPanier = "";

function recupererPanier() {
  let contenu = document.getElementById('contenu');

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

//function supprimerArticlePanier(event){
//  let data = window.localStorage.getItem(keyLocalStorage);
//  data=JSON.parse(data);

//  let id = event.currentTarget.dataset.
//}


const bricbrocBox = "bricbrocBox";
let typeBox = document.querySelectorAll(".box");

for (box of typeBox) {
  if (box) {
    box.addEventListener('click', chooseBox);
  }
}

function chooseBox(event) {
  let box = this.dataset.value;
  localStorage.setItem(bricbrocBox, box);
}



let btnCommander = document.getElementById("commander");
btnCommander.addEventListener('click', commander);

function commander() {
  let contentPanier = window.localStorage.getItem(keyLocalStorage);
  contentPanier = JSON.parse(contentPanier);

  let contentBox = window.localStorage.getItem(bricbrocBox);

  //console.log(contentPanier.length);
  // console.log(contentBox);


  if (contentPanier.length < contentBox) {

    alert('Il vous reste' + (contentBox - contentPanier.length) + 'produit à ajouter');
    // window.location = '';

  } else {
    console.log('toto');
  }
}
