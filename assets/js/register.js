window.onload = function() {

	const register   = document.querySelector("#register_form");
	let register_msg = document.querySelector("#register_msg");
	register_msg.style.display = "none";
	
	/* form fields */
	const firstname        = document.querySelector("#reg_firstname");
	const lastname         = document.querySelector("#reg_lastname");
	const city             = document.querySelector("#reg_city");
	const country          = document.querySelector("#reg_country");
	const day              = document.querySelector("#reg_day");
	const month            = document.querySelector("#reg_month");
	const year             = document.querySelector("#reg_year");
	const email            = document.querySelector("#reg_email");
	const password         = document.querySelector("#reg_password");
	const confirm_password = document.querySelector("#confirm_password");

	/* load event listeners */
	loadEventListeners();

	function loadEventListeners() {
		register.addEventListener('submit', function(e){ registerUser(e); }, false);
	}

	async function registerUser(e){
		e.preventDefault();

		const registerForm = new FormData();
		registerForm.append('firstname', firstname.value);
		registerForm.append('lastname', lastname.value);
		registerForm.append('city', city.value);
		registerForm.append('country', country.value);
		registerForm.append('day', day.value);
		registerForm.append('month', month.value);
		registerForm.append('year', year.value);
		registerForm.append('email', email.value);
		registerForm.append('password', password.value);
		registerForm.append('confirm_password', confirm_password.value);

		const sendForm = await fetch(ADDRESS + "core/ajax/register.php", {
			method: 'post',
			body: registerForm
		}).then(response => response.json())
		.then(data => {
			const {success, firstname_error, lastname_error, email_error, city_error, country_error, day_error, month_error, year_error, password_error, confirm_password_error } = data;
		 	
		 	if(firstname_error != null){
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + firstname_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 			
			}

			if(lastname_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + lastname_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(email_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + email_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(city_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + city_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(country_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + country_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(day_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + day_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(month_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + month_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(year_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + year_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(password_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + password_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(confirm_password_error != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += "<p class='alert alert-danger text-center w-100'>" + confirm_password_error + "</p>";
				
		 		$('#register').modal({
		            backdrop: 'static',
		            keyboard: true, 
		            show: true
		        }); 				
			}

			if(success != null) {
				register_msg.style.display = "block";
				register_msg.innerHTML += `
					<div class='d-flex flex-column'>
					<p class='alert alert-success text-center w-100'>${success}</p>
					<a href='${ADDRESS}/login.php' class='alert alert-info text-center w-100'>Login here!</a>
					</div>`;			
			}
		});

	}

	function reload(){
		location.reload();
	}

};
