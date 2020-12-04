function validate(){

  var form = document.getElementByID('edit')
  var fname = document.forms["fname"].value;

    if(fname==null || fname=="" )
    {
        alert("First name can't be left blank");
        return false;
    }

  return true;

}