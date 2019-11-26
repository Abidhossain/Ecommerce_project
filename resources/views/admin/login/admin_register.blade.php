@extends('admin.admin_master')
@section('title','| User Registration')
@section('custom_css')
  <style media="screen">
  .form-control{
    border-radius: 0px;
  }
  /* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}
/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}


/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  /* display:none; */
  /* background: #f1f1f1; */
  color: #000;
  position: relative;
  /* padding: 10px 35px; */
  font-size: 18px;
}

#message p {
  padding: 7px 11px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -7px;
  content: "\f00c";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -7px;
  content: "\f071";
}
  form-control{
    border-radius:0px;
  }

  </style>
@endsection
@section('content')
<div class="row">
   <div class="col-md-8">
      <div class="tile">
         <div class="tile-body">
            <form method="POST" action="{{ route('user.store') }}">
               @csrf
               <h5 class="login-head"><i class="fa fa-lg fa-fw fa-user text-success"></i>Create User </h5>
               <div class="row">
                 <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">USERNAME</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter User Name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>
                <div class="col-md-12">
               <div class="form-group">
                  <label class="control-label" for="email">Email</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>
                <div class="col-md-12">
               <div class="form-group">
                  <label class="control-label" for="psw">Password</label>
                  <input id="psw" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control show_pass @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>
                <div class="col-md-12">
                <div class="form-group">
                   <label class="control-label" for="password-confirm">Confirm Password</label>
                   <input id="password-confirm" type="password" class="form-control show_pass" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Type Password">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="animated-checkbox">
                  <label>
                  <input type="checkbox" id="check"><span class="label-text">Show Password</span>
                  </label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                 <div class="form-group">
                    <label class="control-label" for="roles">User Role</label>
                    <select id="user-type" class="form-control" name="role_id" id="role_id" required>
                    <option value="">===Select User Role ===</option>
                    <option value="1">Admin</option> 
                    <option value="2">User</option> 
                    </select> 
                </div>
              </div>
               </div>
              <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group btn-container"><a href="{{url('user-list')}}" class="pull-left btn btn-sm btn-warning">Back</a> &nbsp;&nbsp;
                     <button class="btn btn-success btn-sm">Create User</button>
                  </div>
                </div>
              </div>
            </form>
         </div>
      </div>
   </div>
      <div class="col-md-4">
        <div class="tile">
          <div class="title-body">
          <h5>Password must contain the following:</h5>
             <div class="container-fluid" id="message">
             <p id="letter" class="fa fa-warning text"> A <b>lowercase</b> letter</p>
             <p id="capital" class="fa fa-warning text"> A <b>capital (uppercase)</b> letter</p>
             <p id="number" class="fa fa-warning text"> A <b>number</b></p><br>
             <p id="length" class="fa fa-warning text"> Minimum <b>8 characters</b></p>
             </div>
          </div>
        </div>
      </div>
</div>
@endsection
@section('custom_script')
 <script type="text/javascript">
 $(document).ready(function(){
            $('#check').click(function(){
             // alert($(this).is(':checked'));
               $(this).is(':checked') ? $('.show_pass').attr('type','text') : $('.show_pass').attr('type','password');
            });
        });
   var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
// myInput.onblur = function() {
//   document.getElementById("message").style.display = "block";
// }

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
 </script>
@if(Session::has('success'))
<script> 
   swal({
     title: "Success!",
     text: "{{Session::get('success')}}",
     type: "success",
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif
@endsection
