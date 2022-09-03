

	function isEmailId(email){
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(!reg.test(email)){
			alert("Please enter valid email!");
			return false;
		}
		return true;
	}

	function isAddressPin(pin){
		var reg = /^\d{6}$/;
		if(!reg.test(pin)){
			alert("Please enter valid pin!");
                        return false;
		}
		return true;
	}

	function isNumeric(numberInput, length){
		var reg = /^\d+$/;
		if(!reg.test(numberInput)){
			alert("Please enter only digits!");
                        return false;
		}
		if(numberInput.length != length){
			alert("Please enter number of length "+length);
                        return false;
		}
		return true;
	}

	function containEscapeChars(inputString){
		if(inputString.indexOf('"') != -1 || inputString.indexOf("'") != -1){
                        alert("Please enter valid input!");
                	return false;
		} 
		
		return true;
	}

	function containSpecialChar(inputString, reqCharacter){
		if(inputString.indexOf(reqCharacter) == -1){
			alert("Please enter valid input!");
                        return false;
		}
		return true;
	}

	function checkDigitsAfterDecimal(numberInput, lenDecimal){
		if(!isNaN(numberInput)){
			var decimalValue = numberInput.toString().split(".")[1];
			if(decimalValue == null || decimalValue.trim() == ""){
				alert("Please enter valid number!");
                        	return false;
			}
			if(decimalValue.length != lenDecimal){
				alert("Please enter number with decimal length "+lenDecimal);
                        	return false;
			}
		} else {
			alert("Please enter valid number!");
                        return false;
		}
		return true;
	}

	function isNotBlank(input){
		if(input == null || input.trim() == ""){
			alert("Input cannot be blank");
			return false;
		}
		return true;
	}

	function checkPwdFormat(pwd){
		var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#^?&])[A-Za-z\d@$!%*#^?&]{8,16}$/;
		if(!reg.test(pwd)){
			alert("Password does not match with the password format!");
			return false;
		}
		return true;
	}

	function isInDateFormat(dateVal){
      	var d = Date.parse(dateVal);
      	if(isNaN(d)){
      		alert("Please enter valid Date!");
        	return false;
      	}
      	return true;
    }

    function dateInOrderCheck(strtDate, endDate, strtDateComment, endDateComment){

    	if (Date.parse(strtDate) > Date.parse(endDate)) {
    		alert(endDateComment + " cannot be less than " + strtDateComment);
    		return false;
    	}
    	return true;
    }

    function checkBlankForAllInput(valueParams, inpTypeParams){

    	var result = "";
    	var foundBlank = false;

    	for (var i = 0; i < valueParams.length; i++) {
    		if(valueParams[i] == null || valueParams[i].trim() == ""){
				if (!foundBlank) {
					foundBlank = true;
					result = inpTypeParams[i];
				}
				else {
					result += ", "+inpTypeParams[i];
				}
			}
    	}
    	
    	if (!foundBlank) {
    		result = null;
    	}
    	else {
    		result = "Please enter " + result + "!";
    	}
    	return result;
    }

    function isSmallCaseAlphaNumeric(userInput){
	    var acceptSmallCaseNumeric = /^[a-z][a-z\d_.]+$/;
	    //var acceptSmallCaseNumeric = /^[a-z\d]+$/;
	    var blockUpper = /^(?=.*[a-z])(?=.*\d)(?=.*[A-Z]).*$/;
	    var blockSplChar = /^(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#^?&]).*$/;
	    if(blockUpper.test(userInput.trim())) {
	       return false;
	    }
	    if(blockSplChar.test(userInput.trim())) {
	       return false;
	    }
	    if (!acceptSmallCaseNumeric.test(userInput.trim())) {
	    	return false;
	    }
	    if (userInput.endsWith(".")) {
	    	return false;
	    }
	    if (userInput.endsWith("_")) {
	    	return false;
	    }

	    return true;     
	 }
