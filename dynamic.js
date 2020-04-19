// Mira Lee (mfl2zk) Ningshun Chen (nc2bx)

// checks sign-in info is correct
function signin(form) {
	if (form.username.value == "user" && form.pw.value == "1234") {
		$('#username').val('');
		$('#pw').val('');
		window.open('reviews.html');
	}
	else if(form.username.value == "" || form.pw.value == "") {
		alert("Please enter username or password!");
	}
	else {
		alert("Wrong username or password! Please try again.");
	}
}

// anonymous function that computes average
var x = function (a, b) {return (a + b)/2};

// prompts user to enter rating from 1-10 and then computes new average rating based on input and what used to be displayed
function rate() {
	var input = prompt("Please enter your rating for this album", "must be from 1-10");
	var num = parseInt(input);
	if (num < 1 || num > 10 )
		alert("Please try again. Your number must be between 1 and 10.");
	else if (num != null) {
		var currentnum = parseFloat(document.getElementById("p1").innerHTML);
		document.getElementById("p1").innerHTML = x(num, currentnum);
	}
}

function ratetwo() {
	var input = prompt("Please enter your rating for this album", "must be from 1-10");
	var num = parseInt(input);
	if (num < 1 || num > 10 )
		alert("Please try again. Your number must be between 1 and 10.");
	else if (num != null) {
		var currentnum = parseFloat(document.getElementById("p2").innerHTML);
		document.getElementById("p2").innerHTML = x(num, currentnum);
	}
}

function ratethree() {
	var input = prompt("Please enter your rating for this album", "must be from 1-10");
	var num = parseInt(input);
	if (num < 1 || num > 10 )
		alert("Please try again. Your number must be between 1 and 10.");
	else if (num != null) {
		var currentnum = parseFloat(document.getElementById("p3").innerHTML);
		document.getElementById("p3").innerHTML = x(num, currentnum);
	}
}

function ratefour() {
	var input = prompt("Please enter your rating for this album", "must be from 1-10");
	var num = parseInt(input);
	if (num < 1 || num > 10 )
		alert("Please try again. Your number must be between 1 and 10.");
	else if (num != null) {
		var currentnum = parseFloat(document.getElementById("p4").innerHTML);
		document.getElementById("p4").innerHTML = x(num, currentnum);
	}
}