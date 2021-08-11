	/* JS codes for our project by PHPGrammers */

	//checking password mismatch function
	function checkPassword(password, confirmpassword){
		if (password == confirmpassword) {
			let errorMesage = document.querySelector('#errorMessage')
			errorMesage.innerHTML = ''
		} 
		else{
			let errorMesage = document.querySelector('#errorMessage')
			console.log(errorMesage)
			errorMesage.innerHTML = 'Password mismatch. Check and try again.'
		}
	}


	//trigger password check on registration page
	function triggerCheckPassword() {
		let password = document.querySelector('#password').value
		let confirmpassword = document.querySelector('#confirmpassword').value
		checkPassword(password, confirmpassword)
	}


	//login function
	function loginJS() {
		document.querySelector('#login_form').addEventListener('submit', function (e) {
			//prevent page default action
			e.preventDefault()

			//declare variables for data
			const myStaffId = document.querySelector('#staffid').value
			const myPassword = document.querySelector('#password').value

				//config for AJAX (fetch)
				const config_to_send = {
					method: 'POST',
					body: JSON.stringify({staffid: myStaffId, password: myPassword, login_btn: ''}),
					headers: {
						'Content-Type': 'application/json'
					}
				}

				//start ajax request
				fetch('index.php', config_to_send)
				.then(res =>  res.json())
				.then(res => {
					let errorMesage = document.querySelector('#loginErrorMessage')
					if (res.response_id == 1) {
						errorMesage.innerHTML =''
						alert(res.response_msg)
						window.location ='welcome.html'
					} else {
						errorMesage.innerHTML =res.response_msg
					}

					
				});
			})
	}

	//login function
	function userJS() {
				//config for AJAX (fetch)
				const config_to_send = {
					method: 'POST',
					body: JSON.stringify({userID: ''}),
					headers: {
						'Content-Type': 'application/json'
					}
				}

				//start ajax request
				fetch('index.php', config_to_send)
				.then(res =>  res.json())
				.then(res => {
					if (res.response_id == 1) {
						//alert('Wecolme '+ res.data.firstname)
						let fullname = document.querySelector('#fullname')
						fullname.innerHTML = res.data.firstname + ' '+ res.data.lastname + ' ('+ res.data.department +')'
					} else {
						window.location ='index.html'
						
					}

					
				});
			}

		//invoke js login function
		loginJS()
		