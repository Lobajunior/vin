/*SweetAlert Init*/

$(function() {
	"use strict";
	
	var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    //Basic
    $('#sa-basic').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            confirmButtonColor: "#2879ff",   
        });
		return false;
    });

    //A title with a text under
    $('#sa-title').on('click',function(e){
	    swal({   
			title: "Here's a message!",   
            text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#2879ff",   
        });
		return false;
    });

    //Success Message
	$('#sa-success').on('click',function(e){
        swal({   
			title: "good job!",   
             type: "success", 
			text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#01c853",   
        });
		return false;
    });

    //Warning Message
    $('#sa-warning,.sa-warning').on('click',function(e){
	    swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#fec107",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
        });
		return false;
    });

    //Parameter
	$('#sa-params').on('click',function(e){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#fec107",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your imaginary file has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your imaginary file is safe :)", "error");   
            } 
        });
		return false;
    });

    //Custom Image
	$('#sa-image').on('click',function(e){
		swal({   
            title: "John!",   
            text: "Recently joined twitter",   
            imageUrl: "dist/img/user.png" ,
			confirmButtonColor: "#e91e63",   
			
        });
		return false;
    });

    //Auto Close Timer
	$('#sa-close').on('click',function(e){
        swal({   
            title: "Auto close alert!",   
            text: "I will close in 2 seconds.",   
            timer: 2000,   
            showConfirmButton: false 
        });
		return false;
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert;
	
	$.SweetAlert.init();
});




/************************* MES EVENEMENTS LIEES AVEC LIVEWIRE CYCLE *****************************/


window.addEventListener('swal:modal', event => { 
    swal({
        title: event.detail.message,
        text: event.detail.text,
        icon: event.detail.type,
        type: event.detail.type
    });
});

window.addEventListener('swal:modalAjoutNiveau', event => { 
    swal({
        title: event.detail.message,
        text: event.detail.text,
        icon: event.detail.type,
        type: event.detail.type
    });
});

window.addEventListener('swal:modalAjoutSerie', event => { 
    swal({
        title: event.detail.message,
        text: event.detail.text,
        icon: event.detail.type,
        type: event.detail.type
    });
});

window.addEventListener('swal:modalSupprimer', event => { 
    swal({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.type,
        type: event.detail.type
    });
});

window.addEventListener('swal:modalUpdate', event => { 
    swal({
        title: event.detail.message,
        text: event.detail.text,
        icon: event.detail.type,
        type: event.detail.type
    });
});

window.addEventListener('swal:modalDeleteCategorie', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerCategorie',event.detail.id);  
        } else {     
            swal("Annuler", "Vous venez d'annuler cette Action", "error");   
        } 
    });
});
window.addEventListener('swal:modalDeleteCategorieBlog', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerCategorieBlog',event.detail.id);  
        } else {     
            swal("Annuler", "Vous venez d'annuler cette Action", "error");   
        } 
    });
});


window.addEventListener('swal:modalDeleteNiveau', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerNiveau',event.detail.id);  
        } else {     
            swal("Annuler", "Merci d'avoir Annuler", "error");   
        } 
    });
});
// window.addEventListener('swal:modalDeleteSerie', event => { 
//         swal({   
//         title: event.detail.title,   
//         text: event.detail.text,   
//         type: event.detail.type,  
//         showCancelButton: true,   
//         confirmButtonColor: "#fec107",   
//         confirmButtonText: "Supprimer",   
//         cancelButtonText: "Annuler",   
//         closeOnConfirm: false,   
//         closeOnCancel: false 
//     }, function(isConfirm){   
//         if (isConfirm) {     
//             window.livewire.emit('SupprimerSerie',event.detail.id);  
//         } else {     
//             swal("Annuler", "Merci d'avoir Annuler", "error");   
//         } 
//     });
// });

window.addEventListener('swal:modalDeleteSousCategorie', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerSousCategorie',event.detail.id);  
        } else {     
            swal("Annuler", "Merci d'avoir Annuler", "error");   
        } 
    });
});

window.addEventListener('swal:modalDeleteUtilisateurs', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerUtilisateur',event.detail.id);  
        } else {     
            swal("Annuler", "Merci d'avoir Annuler", "error");   
        } 
    });
});

window.addEventListener('swal:modalAddMember', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#30df23",   
        confirmButtonText: "confirmer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('addMemberUser',event.detail.id);  
        } else {     
            swal("Annuler", "vous venez d'annuler cette action", "error");   
        } 
    });
});


window.addEventListener('swal:modalDeletePartenaire', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerPartenaire',event.detail.id);  
        } else {     
            swal("Annuler", "Merci d'avoir Annuler", "error");   
        } 
    });
});

window.addEventListener('swal:modalDeleteProduit', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SuprimerProduit',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});
window.addEventListener('swal:modalDeleteTeam', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#fec107",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SuprimerTeam',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});
window.addEventListener('swal:popupCreateUseratTeam', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#34cc1b",   
        confirmButtonText: "Confirmer",   
        cancelButtonText: "Non",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('PopupTeam',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});
window.addEventListener('swal:modalDeleteBlog', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#34cc1b",   
        confirmButtonText: "Confirmer",   
        cancelButtonText: "Non",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerBlog',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});
window.addEventListener('swal:modalDeleteSlide', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#34cc1b",   
        confirmButtonText: "Confirmer",   
        cancelButtonText: "Non",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('SupprimerSlide',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});
window.addEventListener('swal:modalDeleteCommande', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#34cc1b",   
        confirmButtonText: "Confirmer",   
        cancelButtonText: "Non",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('Supprimer_commande',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});
window.addEventListener('swal:modalFinishOrder', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#34cc1b",   
        confirmButtonText: "Confirmer",   
        cancelButtonText: "Non",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('terminer_commande',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});
window.addEventListener('swal:modalActivateSlide', event => { 
        swal({   
        title: event.detail.title,   
        text: event.detail.text,   
        type: event.detail.type,  
        showCancelButton: true,   
        confirmButtonColor: "#34cc1b",   
        confirmButtonText: "Confirmer",   
        cancelButtonText: "Non",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            window.livewire.emit('finish_activate_slide',event.detail.id);  
        } else {     
            swal("Annuler", "Cette action vient d'etre annuler", "error");   
        } 
    });
});



window.addEventListener('closeModaleModifySousCategorie' , event => {
    $('#EditSousCategorie').modal('hide');
});
window.addEventListener('closeModaleModifyImageSousCategorie' , event => {
    $('#checkSubCategorie').modal('hide');
});
window.addEventListener('closeModalUserEdit' , event => {
    $('#UserEdit').modal('hide');
});
window.addEventListener('closeModalModifGerant' , event => {
    $('#GerantEdit').modal('hide');
});
window.addEventListener('closeModalEditPartenaire' , event => {
    $('#EditPartner').modal('hide');
});
window.addEventListener('closeModalEditProduit' , event => {
    $('#editProduit').modal('hide');
});
window.addEventListener('closeModalInfoProduit' , event => {
    $('#InfosProduit').modal('hide');
});
window.addEventListener('closeModalEditdescription' , event => {
    $('#EditDescription').modal('hide');
});
window.addEventListener('closeModalEditAbout' , event => {
    $('#editAbout').modal('hide');
});
window.addEventListener('closeModalEditTeam' , event => {
    $('#editTeam').modal('hide');
});
window.addEventListener('closeModalEditCatBlog' , event => {
    $('#editBlogCategorie').modal('hide');
});
