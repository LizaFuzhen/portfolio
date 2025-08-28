/* JS pour le menu */

/* select des élements pour le menu (balise html) */
const burger = document.querySelector("#burger")
const menuMobile = document.querySelector("#menu-mobile")

/* select multiple (querySelector ALL) */
const links = document.querySelectorAll("#menu-mobile nav ul li a")

/* écouteur d'event pour cliquer sur menu */
/* node.addEvenListener(evenement, function anym ou flechée avec instruction à faire lors de l'event) */
burger.addEventListener('click',()=>{
    /* ajouter une class et toggle c'est ajoute ou supprime automatiquement */
    burger.classList.toggle('open')
    menuMobile.classList.toggle('open-menu')
})

/* boucler un tableau car j'ai fait une select multiple (querySelectorAll) */
links.forEach(lien => {
    lien.addEventListener('click', () => {
        /* pas de toggle ici, tout ce que je veux faire c'est retirer les classes de mes éléments */
        burger.classList.remove('open')
        menuMobile.classList.remove('open-menu') 
    })
})

const closeBtn = document.querySelector('.close-menu');
if(closeBtn){
  closeBtn.addEventListener('click', () => {
    document.getElementById('burger').classList.remove('open');
    document.getElementById('menu-mobile').classList.remove('open-menu');
  });
}