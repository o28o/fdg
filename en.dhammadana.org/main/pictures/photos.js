/* Encodage des caractères en UTF-8 */

function displayPics()
{
	var photos = document.getElementById('galmin') ;
	// On récupère l'élément ayant pour id galmin
	var liens = photos.getElementsByTagName('a') ;
	// On récupère dans une variable tous les liens contenu dans galmin
	var big_photo = document.getElementById('big_pict') ;
	// Ici c'est l'élément ayant pour id big_pict qui est récupéré, c'est notre photo en taille normale

	var titre_photo = document.getElementById('ph').getElementsByTagName('dt')[0] ;
	// Et enfin le titre de la photo de taille normale

	// Une boucle parcourant l'ensemble des liens contenu dans galmin
	for (var i = 0 ; i < liens.length ; ++i) {
		// Au clique sur ces liens 
		liens[i].onclick = function() {
			big_photo.src = this.href; // On change l'attribut src de l'image en le remplaçant par la valeur du lien
			big_photo.alt = this.title; // On change son titre
			titre_photo.firstChild.nodeValue = this.title; // On change le texte de titre de la photo
			return false; // Et pour finir on inhibe l'action réelle du lien
		};
	}
}
window.onload = displayPics;