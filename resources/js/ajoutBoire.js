
window.addEventListener("load",function(){


    //Détecter si url =  vue liste bouteille
    if (window.location.href.indexOf("bouteille") > -1) {
        
        // ajouter un gestionnaire d'évènement au bouton ajouter
        let elBoutonAjout = this.document.querySelectorAll('.btnAjouter')

        elBoutonAjout.forEach(element => {
           
             //Fontion qui ajoute  une bouteille lorsque l'usager click sur le bouton ajouter
            element.addEventListener('click', function (evt) { 
                evt.preventDefault();
                let idCellier = evt.target.parentElement.parentElement.dataset.id
               // console.log(evt.target.parentElement.parentElement.dataset.id)
               // console.log(idCellier);

                let idVin = evt.target.parentElement.parentElement.dataset.idVin;
               // console.log(idVin);

                let elemBouteille = evt.target.parentElement.parentElement;
                 // console.log(elemBouteille);

                let valueQuantite = elemBouteille.querySelector('.quantite').innerText;
                let elemQuantite = elemBouteille.querySelector('.quantite')
               // console.log(valueQuantite);


               let action = evt.target.parentElement.dataset.action
            //console.log(action)
            let newQuantite = valueQuantite
                if(action == 'plus'){
                    newQuantite = parseInt(valueQuantite) + 1
                }else{
                   console.log(valueQuantite)
                   
                    if(valueQuantite != 0 ){
                    newQuantite = parseInt(valueQuantite) - 1
                    }else{
                        newQuantite = 0;
                        
                    }
                }
              
               // console.log(newQuantite);

               //recherche Url
                const url = window.location.href
                console.log(url);

                const options = {
                        headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": document.querySelector('input[name="_token"]').value
                        },
                        method: "post",
                        credentials: "same-origin",
                        body: JSON.stringify({
                        idCellier :  idCellier,
                        idVin :  idVin,
                        quantite: newQuantite
                        })
                    }
        

                    fetch(url, options)
                    .then((data) => {

                        /*Injecter la quantite dans le HTML*/
                        //console.log(typeof newQuantite)
                       // console.log(valueQuantite);
                       elemQuantite.innerText = newQuantite.toString();
                        
                    }) 
                   
                    .catch(function(error){
                        console.log(error);
                    })
     



                


        
            });
        })

    }

});


