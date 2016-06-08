//startBestilling
function validerStartBestilling() {

		//var fra = document.forms["bestillReiseSkjema"]["fraFlyplass_id"].value;
		//var antallReisende = parseInt(reisende0.value) +  parseInt(reisende1.value) + parseInt(reisende2.value) + parseInt(reisende3.value) + parseInt(reisende4.value);
	var resultat = true;
	for (var i = 0; i < 100; i++) {
		if (document.getElementById('reisende[' + i + ']') == undefined) {
			break;
		}
	}
	var antallArrays = i;

	//alert(antallArrays);

	var antallReisende = 0;

	for (var j = 0; j < i; j++) {
		 var faen = parseInt(document.getElementById('reisende[' + j + ']').value);

		 if (faen != "" && faen != undefined && faen != NaN) {
		 	antallReisende += faen;
		 	alert ("faen");
		 	resultat = false;
		 }
	}

	if (antallReisende < 1 || antallReisende > 10) {
		alert("Minimum 1 reisende, maks 10.");
		resultat = false;
	}



	return resultat;

}


function feilmeldingBoks(maaFyllesUt, kommentar) {

	var fyllesutOutput = "";
	var kommentarOutput = "";
	var output = "";

	// Gjør om det som må fylles ut til tekst 
	for (var i = 0; i < maaFyllesUt.length; i++) {
		fyllesutOutput += "<strong>" + maaFyllesUt[i] + "</strong>";
		if (i < maaFyllesUt.length - 2) {
			fyllesutOutput += ", ";
		}
		else if (i < maaFyllesUt.length - 1) {
			fyllesutOutput += " og ";
		}
	}
	if (maaFyllesUt.length > 0) {
		fyllesutOutput += " må fylles ut.";
	}

	// Gjør om kommentarer til tekst 
	for (var i = 0; i < kommentar.length; i++) {
		if (i == 0 && maaFyllesUt.length != 0) {
			kommentarOutput += "<br><br>";
		}
		else if (i != 0) {
			kommentarOutput += "<br>";
		}

		kommentarOutput += kommentar[i];
		if (i < kommentar.length - 1) {
			kommentarOutput += " ";
		}
	}

	output = fyllesutOutput + kommentarOutput;

	if (output == "") {
		output += "Ingen output";
	}

	swal({
		title: "Obs!",
		text: output,
		type: "error",
		html: true
	});
}