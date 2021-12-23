

let btnCommander = document.getElementById("commander");
btnCommander.addEventListener('click', commander);

function commander() {
  let contentPanier = window.localStorage.getItem(keyLocalStorage);
  contentPanier = JSON.parse(contentPanier);

  let contentBox = window.localStorage.getItem(bricbrocBox);

  if (contentPanier.length < contentBox) {

    window.confirm('Il vous reste' + (contentBox - contentPanier.length) + 'produit à ajouter');
    document.location.href = 'produit';

  } else if (contentPanier.length == contentBox) {
    window.confirm('Votre commande est prise en compte!!');
    document.location.href = 'login';

  }
}

let viderPanier = document.getElementById("viderPanier");
viderPanier.addEventListener('click', viderLePanier);


function viderLePanier() {
  viderPanier = confirm('Êtes-vous sur de vouloir vider le panier ?');
  if (viderPanier) {
    window.localStorage.removeItem(keyLocalStorage);
    setTimeout(function () {
      recupererPanier();
    }, 500);
  }
}