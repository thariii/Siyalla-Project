function validateForm() 
			{
				var firstName = document.getElementById('fname').value;
				var fnameRGEX = /^[a-zA-Z ]+$/;
				var fnameResult = fnameRGEX.test(firstName);
				if (fnameResult == false) 
				{
					alert("Please enter valid first name");
					return false;
				}
				
				var lastName = document.getElementById('lname').value;
				var lnameRGEX = /^[a-zA-Z ]+$/;
				var lnameResult = lnameRGEX.test(lastName);
				if (lnameResult == false) 
				{
					alert("Please enter valid last name");
					return false;
				}
				
				var phoneNum = document.getElementById('phone').value;
				var phoneRGEX = /^\d{10}$/;
				var phoneResult = phoneRGEX.test(phoneNum);
				if (phoneResult == false) 
				{
					alert("Please enter valid phone number");
					return false;
				}
				
				var emailId = document.getElementById('email').value;
				var emailRGEX = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var emailResult = emailRGEX.test(emailId);
				if (emailResult == false) 
				{
					alert("Please enter valid email address");
					return false;
				}
				
				var bdate = document.getElementById('bdate').value;
				if (bdate == "") 
				{
					alert("Please enter birth day");
					return false;
				}
				
			}