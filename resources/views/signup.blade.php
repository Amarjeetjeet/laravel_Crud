<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href=
	"https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src=
	"https://ajax.googleapis.com/ajax/libs/
	jquery/3.3.1/jquery.min.js">
	</script>
	<!-- Popper JS -->
	<script src=
	"https://cdnjs.cloudflare.com/ajax/libs/
	popper.js/1.12.9/umd/popper.min.js">
	</script>
	<!-- Latest compiled JavaScript -->
	<script src=
	"https://maxcdn.bootstrapcdn.com/bootstrap/
	4.0.0/js/bootstrap.min.js">
	</script>
</head>

<body><br>
    <form action="" method="POST" id="form_id" enctype="multipart/form-data">

              <div class="form-group">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <label for="formGroupExampleInput">Sign Up</label>

                <input type="text" class="form-control" id="username" name="username" placeholder="Write Something" value="amar" required>

                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Write Something" value="jeet" required>

                <input type="text" class="form-control" id="email" name="email" placeholder="Write Something" value="amar@gmail.com" required>

                 <input type="text" class="form-control" id="password" name="password" placeholder="Write Something" value="12234" required>

                <input type="text" class="form-control" id="age" name="age" placeholder="Write Something" value="34" required>

                <input type="text" class="form-control" id="number" name="number" placeholder="Write Something" value="98965545" required>

                <input type="file" name="image" id="image">
            </div>
            <br>
            <span style="color: red">@error('data'){{$message}}@enderror</span>
            <br>
            <input type="submit" value="Sign up" id="butsave"  class="btn btn-primary">

</form>

</body>
</html>

<script>


//add data
$("#butsave").click(function(e){
    e.preventDefault();
    console.log("Button click");
    $("#butsave").attr("disabled", "disabled");
var username = $('#username').val();
var password = $('#password').val();
var lastname = $('#lastname').val();
var image = $('#image').val();
var email = $('#email').val();
var age = $('#age').val();
var number = $('#number').val();
console.log(image);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
if(username!=""){

	$.ajax({
		url: "signupdata",
		method: "POST",
		data: {
			username: username,
			lastname: lastname,
			email: email,
			number : number,
			password : password,
			image : image,
			age : age
		},
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
               alert("success");

			}
			else if(dataResult.statusCode==201){
                alert("Error occured !");
			}

		}
	});
}
else{
    alert('Please fill all the field !');
}
});
// let name = $('#usernames').val();
// let password = $('#password').val();
// let age = $('#age').val();
// // Document is ready
// $(document).ready(function () {
//     $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//     $('#submitbtn').on('click', function () {
//         $.ajax({
//             type: "post",
//             url: "signupdata",
//             data: {
//                 name :name,
//                 password : password,
//                 age : age
//             },
//             dataType: "dataType",
//             success: function (response) {
//                 if(response == 200 ){
//                     alert("success");
//                 }
//                 else{
//                     alert("unsuccess");
//                 }
//             }
//         });
//     });

// });
</script>
