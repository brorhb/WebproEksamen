//startBestilling
function validerStartBestilling() {

	var maaFyllesUt = [];
	var kommentar = [];
	var resultat = true;

	var fraFlyplass = document.getElementById("fraFlyplass_id").value; //listeboks
	var tilFlyplass = document.getElementById("tilFlyplass_id").value; //listeboks
	var avgang = document.getElementById("dpd1").value; //datepicker listeboks
	var retur = document.getElementById("dpd2").value; //datepicker listeboks
	//var turRetur = document.getElementById("turRetur").value;
	//var enVei = document.getElementById("enVei").value;

	var turRetur = document.getElementsByName("reisevalg")[0].checked;
	var enVei = document.getElementsByName("reisevalg")[1].checked;

	//alert("(" + turRetur + ") (" + enVei + ")");





		//var fra = document.forms["bestillReiseSkjema"]["fraFlyplass_id"].value;
		//var antallReisende = parseInt(reisende0.value) +  parseInt(reisende1.value) + parseInt(reisende2.value) + parseInt(reisende3.value) + parseInt(reisende4.value);
	for (var i = 0; i < 100; i++) {
		if (document.getElementById('reisende[' + i + ']') == undefined) {
			break;
		}
	}
	var antallArrays = i;

	//alert(antallArrays);

	var antallReisende = 0;

	for (var j = 0; j < i; j++) {
		 var faen = document.getElementById('reisende[' + j + ']').value;

		 if (faen != "NaN" && faen != "") {
		 	var antall = parseInt(faen);
		 	if (antall < 0) {
		 		kommentar.push("Antall reisende kan ikke være et negativt tall.");
		 		resultat = false;
		 	}
		 	antallReisende += antall;
		 }
	}

	if (antallReisende < 1 || antallReisende > 10) {
		kommentar.push("Minimum 1 reisende, maks 10.");
		resultat = false;
	}

	if (fraFlyplass == "" || fraFlyplass == null) {
		maaFyllesUt.push("flyplass 1");
		resultat = false;
	}
	if (tilFlyplass == "" || tilFlyplass == null) {
		maaFyllesUt.push("flyplass 2");
		resultat = false;
	}
	if (fraFlyplass == tilFlyplass && (fraFlyplass != "" && fraFlyplass != null) && (tilFlyplass != "" && tilFlyplass != null)) {
		kommentar.push("<strong>Flyplassene</strong> kan ikke være like");
			resultat = false;
	}

	if (avgang == "" || avgang == null) {
		maaFyllesUt.push("fra dato");
		resultat = false;
	}

	if (turRetur == true) {
		if (retur == "" || retur == null) {
			maaFyllesUt.push("til dato");
			resultat = false;
		}
	}

	// Skriver ut feilmeldingsboks
	if (!resultat) {
		feilmeldingBoks(maaFyllesUt, kommentar);
	}

	// Returnerer om det er noen feil
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

function isNumberKey(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
}