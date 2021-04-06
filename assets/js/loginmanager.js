jQuery(function() {
	
	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,})?$/;
		return emailReg.test($email);
	}

	$(function() {
		$("#activate-submit").on('click', function() {
			if($("#useractivation").val() != "" && $("#activationcode").val() != "" && validateEmail($("#useractivation").val())) {
				$.ajax({
				method: "POST",
				url: "../../classes/loginManager.php",
				data: { activity: 'activate', email: $("#useractivation").val(), authCode: $("#activationcode").val() }
				}).done(function(msg) {
					if(msg !== "") {
						alert(msg);
					} else {
						location.href = "../../classes/loginManager.php";
					}
					location.href = "../../classes/loginManager.php";
				});
			} else {
				alert("Please fill all fields with valid data!");
			}
		});
	});

	$(function() {
		$("#login-submit").on('click', function() {
			if($("#username").val() != "" && $("#password1").val() != "" && validateEmail($("#username").val())) {
				$.ajax({
				method: "POST",
				url: "../../classes/loginManager.php",
				data: { activity: 'login', email: $("#username").val(), password: $("#password1").val() }
				}).done(function(result) {
					if (result === 'success') {
						location.href = "../../index.php";
					} else {
						alert('login failed, please try again.');
					}
				})
			} else {
				alert("All fields must contain valid data.");
			}
		});
	});

	$(function() {
		$("#register-submit").on('click', function() {
			if($("#first_name").val() != "" && $("#last_name").val() != "" && $("#email").val() != "" && $("#password2").val() != "" && validateEmail($("#email").val())) {
				if($("#password2").val() === $("#confirm-password").val()) {
					$.ajax({
					method: "POST",
					url: "classes/loginManager.php",
					data: { activity: 'register', first_name: $("#first_name").val(), last_name: $("#last_name").val(), email: $("#email").val(), password: $("#password2").val() }
					}).done(function(msg) {
						alert(msg);
					});
				} else {
					alert("Passwords do not match!");
				}
				
			} else {
				alert("Please fill all fields with valid data!");
			}
		});
	});

	$(function() {
		$("#change-password").on('click', function() {
			if($("#email").val() != "" && validateEmail($("#email").val())) {
				if($("#password1").val() === $("#password2").val()) {
					$.ajax({
					method: "POST",
					url: "../../classes/loginManager.php",
					data: { activity: 'change.password', email: $("#email").val(), oldPassword: $("#password2").val(), newPassword: $('#password3').val() }
					}).done(function(msg) {
						alert(msg);
					});
				} else {
					alert("Passwords do not match.");
				}
				
			} else {
				alert("Please check all fields contain correct data.");
			}
		});
	});
});