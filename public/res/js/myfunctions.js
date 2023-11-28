function message(mes,bgcolor,textcolor,icn,head) {
$.toast({text: mes,loader: false,allowToastClose : true,heading: head,position: 'top-right',hideAfter: 5000,showHideTransition: 'slide',bgColor : bgcolor,textColor: textcolor,icon: icn});
}
function initCap(value) {
    return value
      .toLowerCase()
      .replace(/(?:^|[^a-zØ-öø-ÿ])[a-zØ-öø-ÿ]/g, function (m) {
        return m.toUpperCase();
      });
  }

  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(
        /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
        );
    return pattern.test(emailAddress);
}

function isValidmobile(mNum) {
    var pattern = new RegExp(/^(?:\+88|88)?(01[3-9]\d{8})$/);
    return pattern.test(mNum);
}

function MobileCountValidate(thisval) {

    var tID=$(thisval).attr('id');

    $("#"+tID).val($("#"+tID).val().replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1'));

    if ($("#"+tID).val().length==11) {
        $("#"+tID).css('color', 'green');
    } else {
        $("#"+tID).css('color', 'red');
    }

}


function EmptyValueFocus(params) {

    for (i=0; i<params.length; i++) {

        var vName = $('#'+params[i]).val();
            if (vName == '') {
            message('Need '+params[i]+' Value', '#FF0000', 'white', 'error', 'Error');
            $('#'+params[i]).focus();
            return false;
        }
    }
    return true;
}


function editValuePst(keysArray,valuesArray) {

        for (var i = 0; i < keysArray.length; i++) {
            $('#'+keysArray[i]).val(valuesArray[i]=="null" ? "":valuesArray[i]);
        }

}

function capitalize(str) {
    strVal = '';
    str = str.split(' ');
    for (var chr = 0; chr < str.length; chr++) {
      strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' '
    }
    return strVal
  }