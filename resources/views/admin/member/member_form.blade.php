@extends('admin.admin_master')
@section('title','Ecommerce | User Registration')
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
<div class="row clearfix">
   <div class="col-md-8"> 
      <div class="tile">
         <div class="tile-body">
            <form method="POST" action="{{ route('member_store') }}">
               @csrf
               <h5 class="login-head"><i class="fa fa-lg fa-fw fa-user text-success"></i>Member form </h5>
              
               <div class="row">

                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">Executive Name</label>
                  <input id="executive_name" name="executive_name" type="text" class="form-control @error('executive_name') is-invalid @enderror" executive_name="executive_name" value="{{ old('executive_name') }}"  autocomplete="executive_name" placeholder="Enter executive name">
                  @error('executive_name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>

               </div>  <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">Privilege Card No</label>
                  <input id="privilege_card_no" type="number" name="privilege_card_no" class="form-control @error('privilege_card_no') is-invalid @enderror" privilege_card_no="privilege_card_no" value="{{ old('privilege_card_no') }}"  autocomplete="privilege_card_no" placeholder="Enter privilege card no">
                  @error('privilege_card_no')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>

                 <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">Name</label>
                  <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="Enter Name">
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
                  <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Enter Email Address">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>

                <div class="col-md-12">
               <div class="form-group">
                  <label class="control-label" for="cell_number">Cell Number</label>
                  <input id="cell_number" type="number" name="cell_number" class="form-control @error('cell_number') is-invalid @enderror" value="{{ old('cell_number') }}"  autocomplete="cell_number" placeholder="Enter cell number ">
                  @error('cell_number')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>

               <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="present_address">Present Address</label>
                  <input id="present_address" type="text" name="present_address" class="form-control @error('present_address') is-invalid @enderror" present_address="present_address" value="{{ old('present_address') }}"  autocomplete="present_address" placeholder="Enter member present address">
                  @error('present_address')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>

               </div>
                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="permanent_address">Permanent Address</label>
                  <input id="permanent_address" type="text" name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror" permanent_address="permanent_address" value="{{ old('permanent_address') }}"  autocomplete="permanent_address" placeholder="Enter member permanent address">
                  @error('permanent_address')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>
                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">Hospital Name</label>
                  <input id="hospital_name" type="text" name="hospital_name" class="form-control @error('hospital_name') is-invalid @enderror" hospital_name="hospital_name" value="{{ old('hospital_name') }}"  autocomplete="hospital_name" placeholder="Enter member hospital name">
                  @error('hospital_name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>
                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">Doctors Name</label>
                  <input id="doctors_name" type="text" name="doctors_name" class="form-control @error('doctors_name') is-invalid @enderror" doctors_name="doctors_name" value="{{ old('doctors_name') }}"  autocomplete="doctors_name" placeholder="Enter member doctors name">
                  @error('doctors_name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>
                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">What type's of problem</label>
                  <input id="problem_type" type="text" name="problem_type" class="form-control @error('problem_type') is-invalid @enderror" problem_type="problem_type" value="{{ old('problem_type') }}"  autocomplete="problem_type" placeholder="Enter member problem type">
                  @error('problem_type')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>


                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">Attach Pharmacy</label>
                  <input id="attache_pharmacy" type="text" name="attache_pharmacy" class="form-control @error('attache_pharmacy') is-invalid @enderror" attache_pharmacy="attache_pharmacy" value="{{ old('attache_pharmacy') }}"  autocomplete="attache_pharmacy" placeholder="Enter member attache pharmacy">
                  @error('attache_pharmacy')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>

                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="name">What type of medicine</label>
                  <input id="medicine_type" type="text" name="medicine_type" class="form-control @error('medicine_type') is-invalid @enderror" medicine_type="medicine_type" value="{{ old('medicine_type') }}"  autocomplete="medicine_type" placeholder="Enter member medicine type">
                  @error('medicine_type')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               </div>

           
              <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group btn-container"><a href="{{url('member-list')}}" class="pull-left btn btn-sm btn-warning">Back</a> &nbsp;&nbsp;
                     <button class="btn btn-success btn-sm">Create member</button>
                  </div>
                </div>
              </div>
            </form>
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
