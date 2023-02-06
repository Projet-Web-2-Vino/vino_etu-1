window.addEventListener("load", function() {


    //Détecter si url =  vue liste bouteille
    if (window.location.href.indexOf("bouteille") > -1) {
        //console.log('oui')


        //Gestionnaire d'evenement du bouton delete

        const modals = document.querySelectorAll("[data-modal]");
        console.log(modals)
        modals.forEach(function(trigger) {
            trigger.addEventListener("click", function(event) {
                event.preventDefault();
                let form = event.target.parentElement.parentElement
                console.log(typeof trigger.dataset.modal)
                console.log(trigger.dataset.modal)
                let modal = document.getElementById(trigger.dataset.modal);
                
                console.log(modal);
                modal.classList.add("open");
                const exits = modal.querySelectorAll(".modal-exit");
                exits.forEach(function(exit) {
                    exit.addEventListener("click", function(event) {
                        event.preventDefault();
                        console.log(form)
                        console.log(event.target.dataset.action)
                        if (event.target.dataset.action == "supprimer") {
                            console.log(form)
                            form.submit();
                        }
                        modal.classList.remove("open");
                    });
                });
            });
        });



        // ajouter un gestionnaire d'évènement au bouton ajouter/enlever
        let elBoutonAjout = this.document.querySelectorAll('.btnModif')

        elBoutonAjout.forEach(element => {

            //Fontion qui ajoute  une bouteille lorsque l'usager click sur le bouton ajouter
            element.addEventListener('click', function(evt) {
                evt.preventDefault();
                let idCellier = element.dataset.id
               // console.log(evt.target)
                 //console.log(idCellier);

                let idVin = element.dataset.idVin;
                 //console.log(idVin);

                let elemBouteille = evt.target.parentElement.parentElement;
                // console.log(elemBouteille);

                let valueQuantite = elemBouteille.querySelector('.quantite').innerText;
                let elemQuantite = elemBouteille.querySelector('.quantite')
               // console.log(valueQuantite);


                let action = evt.target.parentElement.dataset.action
                //console.log(action)
                let newQuantite = valueQuantite
                if (action == 'plus') {
                    newQuantite = parseInt(valueQuantite) + 1
                } else {
                    //console.log(valueQuantite)

                    if (valueQuantite != 0) {
                        newQuantite = parseInt(valueQuantite) - 1
                    } else {
                        newQuantite = 0;

                    }
                }

                // console.log(newQuantite);

                //recherche Url
                const url = window.location.href
                //console.log(url);

                const options = {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": document.querySelector('input[name="_token"]')
                            .value
                    },
                    method: "post",
                    credentials: "same-origin",
                    body: JSON.stringify({
                        idCellier: idCellier,
                        idVin: idVin,
                        quantite: newQuantite
                    })
                }


                 fetch(url, options)
                    .then((data) => {
                        console.log(data)
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