function mayus(e) {
    e.value = e.value.toUpperCase();
}

function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}