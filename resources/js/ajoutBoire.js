
window.addEventListener("load",function(){


    //Détecter si url =  vue liste bouteille
    if (window.location.href.indexOf("bouteille") > -1) {
        
        // ajouter un gestionnaire d'évènement au bouton ajouter
        let elBoutonAjout = this.document.querySelectorAll('.btnAjouter')

        elBoutonAjout.forEach(element => {
           
             //Fontion qui ajoute  une bouteille lorsque l'usager click sur le bouton ajouter
            element.addEventListener('click', function (evt) { 
                evt.preventDefault();
                let idCellier = evt.target.parentElement.dataset.id;
                console.log(idCellier);

                let idVin = evt.target.parentElement.dataset.idVin;
                console.log(idVin);

                let elemBouteille = evt.target.parentElement.parentElement;
                  console.log(elemBouteille);

                let elemQuantite = elemBouteille.querySelector('.quantite').innerText;
                console.log(elemQuantite);

                let newQuantite = parseInt(elemQuantite) + 1
                console.log(newQuantite);

                const url = window.location.href;
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
                    .then((resp) => resp.json()) //Transforme  data en json
                    .then(function(data){
                        
                            
                    })
                    .catch(function(error){
                        console.log(error);
                    })
     






        
            }).bind(this);
        })

    }

});


