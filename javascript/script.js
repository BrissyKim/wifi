    function validate() {
      var phone_number = document.getElementById("phone_num").value;
      var state = document.getElementById("selectstate").value;

      var nameValidation = checkName();
      var phoneValidation = phonenumber(phone_number);
      var passwordValidation = password();
      var stateValidation = stateselect(state);
      var genderValidation = validsex();
      var agreementValidation = termsAndCondition();

      if (nameValidation && phoneValidation && passwordValidation && stateValidation && genderValidation && agreementValidation) {
        document.getElementById("sign_up_form").submit();
      } else {
        document.getElementById("sign_up_form").addEventListener('submit', function(e) {
          e.preventDefault();
        });
      }
    }

    function checkName() {
      var empt = document.form1.username.value;
      if (empt == "") {
        document.getElementById("surnameMissing").style.display = "block";
        return false;
      } else {
        document.getElementById("surnameMissing").style.display = "none";
        return true;
      }
    }

    function password() {
      if (document.getElementById('password').value === document.getElementById('confirm_password').value &&
        document.getElementById('password').value !== '' && document.getElementById('confirm_password').value !== '') {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = '* Matching';
        return true;
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = '* Not Matching';
        return false;
      }
    }

    function phonenumber(inputtxt) {
      if (!/^[0-9]{9}$/.test(inputtxt)) {
        document.getElementById("messagephone").style.display = "block";
        document.getElementById('messagephone').style.color = 'red';
//        document.getElementById('messagephone').innerHTML = '* Not Valid Number';
        return true;
      } else {
        document.getElementById("messagephone").style.display = "none";
        return true;
      }
    }

    function stateselect(ucountry) {
      if (ucountry == "Default") {
        document.getElementById("messagestate").style.display = "block";
        return false;
      } else {
        document.getElementById("messagestate").style.display = "none";
        return true;
      }
    }

    function validsex() {

      if (document.getElementById("msexselect").checked || document.getElementById("fsexselect").checked) {
        document.getElementById("messagegender").style.display = "none";
        return true;
      }
      else {
        document.getElementById("messagegender").style.display = "block";
        return false;
      }
    }

    function termsAndCondition(){

      if(document.getElementById("terms").checked){
        document.getElementById("messageagreement").style.display = "none"
        return true;
      }
      else{
        document.getElementById("messageagreement").style.display = "block"
        return false;
      }

    }
