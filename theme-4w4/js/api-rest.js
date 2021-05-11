(function(){
	//let bouton = document.getElementById('bout_nouvelles')
    let nouvelles = document.querySelector('.nouvelles section')
    window.addEventListener('load', monAjax)
    
    function monAjax()
{
   let maRequete = new XMLHttpRequest();
   console.log(maRequete)
   maRequete.open('GET', monObjJS.siteURL + '/wp-json/wp/V2/posts');
   maRequete.onload = function () {
       console.log(maRequete)
       if (maRequete.status >= 200 && maRequete.status < 400) {
           let data = JSON.parse(maRequete.responseText);
           let chaine = ''
           for(const elm of data){
               chaine += '<h2>' + elm.title.rendered + '</h2>'
               chaine += elm.content.rendered
           }
       nouvelles.innerHTML = chaine;
       } else {
           console.log('La connexion est faite mais il y a une erreur')
       }
   }
   maRequete.onerror = function () {
       console.log("erreur de connexion");
   }
   maRequete.send()
}
/*-----------------------------------------------------------------------------
controle du formulaire d'edition d'article de categorie Nouvelles
----------------------------------------------------------------------------- */
bout_ajout = document.getElementById('bout-rapide')
bout_ajout.addEventListener('mousedown', function(){
    console.log('ajout')

    let monArticle = {
        "title" : document.querySelector('.admin-rapid [name="title"]').value,
        "content" : document.querySelector('.admin-rapid [name="content"]').value,
        "status" : "publish",
        "categories" : [33]
    }

    console.log(JSON.stringify (monArticle))
    let creerArticle = new XMLHttpRequest();
    creerArticle.open("POST", monObjJS.siteURL + '/wp-json/wp/V2/posts')
    creerArticle.setRequestHeader("X-WP-Nonce", monObjJS.nonce)
    creerArticle.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    creerArticle.send(JSON.stringify(monArticle))
    creerArticle.onreadystatechange = function(){
        if(creerArticle.readyState == 4){
            if (creerArticle.status == 201){
                document.querySelector('.admin-rapid [name="title"]').value = ''
                document.querySelector('.admin-rapid [name="content"]').value = ''
            }
            else{
                alert('erreur vous devez réessayer - status = ' + creerArticle.status)
            }
        }
    }

})

		
}())	
