// var postUrl = '/ccapp/addNewCardToProfileList/';
// var cc_FormUrl = "/ccapp/public/cc_form";
console.log("WordPress modal plugin loaded.");

function setupModal() {
  window.theModal = new modal();

  theModal.attachModal();
	//   theModal.content(html);
	//    init();   

	// theModal.showModal(); 
}

document.addEventListener("DOMContentLoaded", setupModal, true);