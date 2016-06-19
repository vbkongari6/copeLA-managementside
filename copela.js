var usernameletters = /^[A-Za-z0-9@&!]{1,20}$/;
var nameletters = /^[A-Za-z0-9 ]{1,50}$/;
var numbers = /^[0-9]{2}$/;

// validation of postlogin.html
function validateEmployeeLoginForm() { 
    // validating username   
    var UN = document.getElementById("username").value;
    var errorUsername = "";
    document.getElementById("usernameerror").innerHTML = errorUsername;
    if (UN != "") {
        if (UN.match(usernameletters)) { ; }
        else {
            UN = "";
            errorUsername = "* Username can have alphanumeric, @, &, !. No spaces.";
            document.getElementById("usernameerror").innerHTML = errorUsername;
            return false;
        }
    }
    else{
        errorUsername = "* Username is mandatory.";
        document.getElementById("usernameerror").innerHTML = errorUsername;
        return false;
    }

    // validating password
    var PW = document.getElementById("password").value;
    var errorPassword = "";
    document.getElementById("passworderror").innerHTML = errorPassword;
    if(PW == ""){
        errorPassword = "* Password is mandatory";
        document.getElementById("passworderror").innerHTML = errorPassword;
        return false;
    }
    else{
        return true;
    }
} // end of validation of postlogin.html



// validation of add employee form page (addemployee.html)
function addemployeepageform(){
    // validating username 
    var un = document.getElementById("addusername").value;
    var errorAddUsername = "";
    document.getElementById("addusernameerror").innerHTML = errorAddUsername;
    if (un != "") {
        if (un.match(usernameletters)) { ; }
        else {
            un = "";
            errorAddUsername = "* Username can have alphanumeric, @, &, !. No spaces.";
            document.getElementById("addusernameerror").innerHTML = errorAddUsername;
            return false;
        }
    }
    else{
        errorAddUsername = "* Username is mandatory.";
        document.getElementById("addusernameerror").innerHTML = errorAddUsername;
        return false;
    }

    // validating password
    var pw = document.getElementById("addpassword").value;
    var errorAddPassword = "";
    document.getElementById("addpassworderror").innerHTML = errorAddPassword;
    if(pw == ""){
        errorAddPassword = "* Password is mandatory";
        document.getElementById("addpassworderror").innerHTML = errorAddPassword;
        return false;
    }
    else{ ; }

    // validating first name
    var fn = document.getElementById("addfirstname").value;
    var errorAddFirstname = "";
    document.getElementById("addfirstnameerror").innerHTML = errorAddFirstname;
    if (fn != "") {
        if (fn.match(nameletters)) { ; }
        else {
            fn = "";
            errorAddFirstname = "* First Name should have alphabets, spaces only. Max 50 letters.";
            document.getElementById("addfirstnameerror").innerHTML = errorAddFirstname;
            return false;
        }
    }
    else{
        errorAddFirstname = "* First Name is mandatory.";
        document.getElementById("addfirstnameerror").innerHTML = errorAddFirstname;
        return false;
    }

    // validating last name
    var ln = document.getElementById("addlastname").value;
    var errorAddLastname = "";
    document.getElementById("addlastnameerror").innerHTML = errorAddLastname;
    if (ln != "") {
        if (ln.match(nameletters)) { ; }
        else {
            ln = "";
            errorAddLastname = "* Last Name should have alphabets, spaces only.";
            document.getElementById("addlastnameerror").innerHTML = errorAddLastname;
            return false;
        }
    }
    else{
        errorAddLastname = "* Last Name is mandatory.";
        document.getElementById("addlastnameerror").innerHTML = errorAddLastname;
        return false;
    }

    // validating age
    var age = document.getElementById("addage").value;
    var errorAddAge = "";
    document.getElementById("addageerror").innerHTML = errorAddAge;
    if (age != "") {
        if (age.match(numbers) && age >=18 && age <=99 ) { ; }
        else {
            age = "";
            errorAddAge = "* Age should be 18-99 years only.";
            document.getElementById("addageerror").innerHTML = errorAddAge;
            return false;
        }
    }
    else{
        errorAddAge = "* Age is mandatory.";
        document.getElementById("addageerror").innerHTML = errorAddAge;
        return false;
    }
    
    // validating usertype
    var type1 = document.getElementById("admin").checked;
    var type2 = document.getElementById("salesmgr").checked;
    var type3 = document.getElementById("mgr").checked;
    var errorAddUsertype = "";
    document.getElementById("addusertypeerror").innerHTML = errorAddUsertype;
    if (type1 == true || type2 == true || type3 == true){;}
    else{
        errorAddUsertype = "* Usertype is mandatory.";
        document.getElementById("addusertypeerror").innerHTML = errorAddUsertype;
        return false;
    }

    return true;
} // end of validation of add employee form page (addemployee.html)



//validation of delete employee form page
function deleteemployeepageform(a){
    //validation of checkboxes
    var check = 0; var i=0; 
    var errorDelete = "";
    document.getElementById("deleteerror").innerHTML = errorDelete;
    while(i<a){
        if(document.getElementById(i).checked == true){ 
            check = 1; 
            var k = confirm("Do you really want to delete ?");
            if(k == true){ return true; }
            else { return false; }
        }
        i++;
    }
    if(check == 0){
            errorDelete = "* Select atleast one user in order to delete.";
            document.getElementById("deleteerror").innerHTML = errorDelete;
            return false;
        }
}

//validation of edit user selection
function editemployeepageform1(){  
    // validating radio buttons, whether an user is selected to edit or not
    var chkvalue = 0;
    var errorEdit = "";
    document.getElementById("editerror").innerHTML = errorEdit;
    var elem = document.forms['editemployeeform'].elements['edit'];
    len = elem.length - 1;
    for(i=0; i<=len; i++){
        if(elem[i].checked == true){ chkvalue = 1; return true; }
    }
    if(chkvalue == 0){ 
        errorEdit = "* Select an user in order to edit.";
        document.getElementById("editerror").innerHTML = errorEdit;
        return false;
    }
}



// validation of edit employee form page
function editemployeepageform2(){
    // validating username 
    var un = document.getElementById("editusername").value;
    var errorEditUsername = "";
    document.getElementById("editusernameerror").innerHTML = errorEditUsername;
    if (un != "") {
        if (un.match(usernameletters)) { ; }
        else {
            un = "";
            errorEditUsername = "* Username can have alphanumeric, @, &, !. No spaces.";
            document.getElementById("editusernameerror").innerHTML = errorEditUsername;
            return false;
        }
    }
    else{
        errorEditUsername = "* Username is mandatory.";
        document.getElementById("editusernameerror").innerHTML = errorEditUsername;
        return false;
    }

    // validating password
    var pw = document.getElementById("editpassword").value;
    var errorEditPassword = "";
    document.getElementById("editpassworderror").innerHTML = errorEditPassword;
    if(pw == ""){
        errorEditPassword = "* Password is mandatory";
        document.getElementById("editpassworderror").innerHTML = errorEditPassword;
        return false;
    }
    else{ ; }

    // validating first name
    var fn = document.getElementById("editfirstname").value;
    var errorEditFirstname = "";
    document.getElementById("editfirstnameerror").innerHTML = errorEditFirstname;
    if (fn != "") {
        if (fn.match(nameletters)) { ; }
        else {
            fn = "";
            errorEditFirstname = "* First Name should have alphabets, spaces only. Max 50 letters.";
            document.getElementById("editfirstnameerror").innerHTML = errorEditFirstname;
            return false;
        }
    }
    else{
        errorEditFirstname = "* First Name is mandatory.";
        document.getElementById("editfirstnameerror").innerHTML = errorEditFirstname;
        return false;
    }

    // validating last name
    var ln = document.getElementById("editlastname").value;
    var errorEditLastname = "";
    document.getElementById("editlastnameerror").innerHTML = errorEditLastname;
    if (ln != "") {
        if (ln.match(nameletters)) { ; }
        else {
            ln = "";
            errorEditLastname = "* Last Name should have alphabets, spaces only.";
            document.getElementById("editlastnameerror").innerHTML = errorEditLastname;
            return false;
        }
    }
    else{
        errorEditLastname = "* Last Name is mandatory.";
        document.getElementById("editlastnameerror").innerHTML = errorEditLastname;
        return false;
    }

    // validating age
    var age = document.getElementById("editage").value;
    var errorEditAge = "";
    document.getElementById("editageerror").innerHTML = errorEditAge;
    if (age != "") {
        if (age.match(numbers) && age >=18 && age <=99 ) { ; }
        else {
            age = "";
            errorEditAge = "* Age should be 18-99 years only.";
            document.getElementById("editageerror").innerHTML = errorEditAge;
            return false;
        }
    }
    else{
        errorEditAge = "* Age is mandatory.";
        document.getElementById("editageerror").innerHTML = errorEditAge;
        return false;
    }
    
    // validating usertype
    var type1 = document.getElementById("admin").checked;
    var type2 = document.getElementById("salesmgr").checked;
    var type3 = document.getElementById("mgr").checked;
    var errorEditUsertype = "";
    document.getElementById("editusertypeerror").innerHTML = errorEditUsertype;
    if (type1 == true || type2 == true || type3 == true){;}
    else{
        errorEditUsertype = "* Usertype is mandatory.";
        document.getElementById("editusertypeerror").innerHTML = errorEditUsertype;
        return false;
    }

    return true;
} // end of validation of edit employee form page



//validation of add product category form
function addproductcategoryform(){
    // validating category name
    var cn = document.getElementById("addcategoryname").value;
    var errorAddCategoryname = "";
    document.getElementById("addcategorynameerror").innerHTML = errorAddCategoryname;
    if (cn != "") {
        if (cn.match(nameletters)) { ; }
        else {
            cn = "";
            errorAddCategoryname = "* Category Name should have alphabets, spaces only. Max 50 letters.";
            document.getElementById("addcategorynameerror").innerHTML = errorAddCategoryname;
            return false;
        }
    }
    else{
        errorAddCategoryname = "* Category Name is mandatory.";
        document.getElementById("addcategorynameerror").innerHTML = errorAddCategoryname;
        return false;
    }

    //validating category description
    var cd = document.getElementById("addcategorydescription").value;
    var errorAddCategoryDescription = "";
    document.getElementById("addcategorydescriptionerror").innerHTML = errorAddCategoryDescription;
    if (cd == "") {
        errorAddCategoryDescription = "* Category Description is mandatory.";
        document.getElementById("addcategorydescriptionerror").innerHTML = errorAddCategoryDescription;
        return false;
    }

    //validating image url
    var ci = document.getElementById("addcategoryimage").value;
    var errorAddCategoryImage = "";
    document.getElementById("addcategoryimageerror").innerHTML = errorAddCategoryImage;
    if (ci == "") {
        errorAddCategoryImage = "* Category Image is mandatory.";
        document.getElementById("addcategoryimageerror").innerHTML = errorAddCategoryImage;
        return false;
    }

    return true;
}



//
function editproductcategoryform1(){
    // validating radio buttons, whether a product category is selected to edit or not
    var chkvalue = 0;
    var errorEdit = "";
    document.getElementById("editerror").innerHTML = errorEdit;
    var elem = document.forms['editproductcategoryform'].elements['edit'];
    len = elem.length;
    for(i=0; i<=len; i++){
        if(elem[i].checked == true){ chkvalue = 1; return true; }
    }
    if(chkvalue == 0){ 
        errorEdit = "* Select a product category in order to edit.";
        document.getElementById("editerror").innerHTML = errorEdit;
        return false;
    }
}



//validation of edit product category form
function editproductcategoryform2(){
    // validating category name
    var cn = document.getElementById("editcategoryname").value;
    var errorEditCategoryname = "";
    document.getElementById("editcategorynameerror").innerHTML = errorEditCategoryname;
    if (cn != "") {
        if (cn.match(nameletters)) { ; }
        else {
            cn = "";
            errorEditCategoryname = "* Category Name should have alphabets, spaces only. Max 50 letters.";
            document.getElementById("editcategorynameerror").innerHTML = errorEditCategoryname;
            return false;
        }
    }
    else{
        errorEditCategoryname = "* Category Name is mandatory.";
        document.getElementById("editcategorynameerror").innerHTML = errorEditCategoryname;
        return false;
    }

    //validating category description
    var cd = document.getElementById("editcategorydescription").value;
    var errorEditCategoryDescription = "";
    document.getElementById("editcategorydescriptionerror").innerHTML = errorEditCategoryDescription;
    if (cd == "") {
        errorEditCategoryDescription = "* Category Description is mandatory.";
        document.getElementById("editcategorydescriptionerror").innerHTML = errorEditCategoryDescription;
        return false;
    }

    //validating image url
    var ci = document.getElementById("editimageurl").value;
    var errorEditCategoryImage = "";
    document.getElementById("editcategoryimageerror").innerHTML = errorEditCategoryImage;
    if (ci == "") {
        errorEditCategoryImage = "* Category Image is mandatory.";
        document.getElementById("editcategoryimageerror").innerHTML = errorEditCategoryImage;
        return false;
    }

    return true;
}



//validation of delete product category form page
function deleteproductcategoryform(a){
    //validation of checkboxes
    var check = 0; var i=0; 
    var errorDelete = "";
    document.getElementById("deleteerror").innerHTML = errorDelete;
    while(i<a){
        if(document.getElementById(i).checked == true){ 
            check = 1; 
            var k = confirm("Do you really want to delete ?");
            if(k == true){ return true; }
            else { return false; }
        }
        i++;
    }
    if(check == 0){
        errorDelete = "* Select atleast one product category in order to delete.";
        document.getElementById("deleteerror").innerHTML = errorDelete;
        return false;
    }
}



//validation of add product 
function addproductform(){
    //validating selection list for product category


    //validating product name
    var pn = document.getElementById("addproductname").value;
    var errorProductName = "";
    document.getElementById("addproductnameerror").innerHTML = errorProductName;
    if (pn != "") {
        if (pn.match(nameletters)) { ; }
        else {
            pn = "";
            errorProductName = "* Product Name should have alphabets, spaces only. Max 50 letters.";
            document.getElementById("addproductnameerror").innerHTML = errorProductName;
            return false;
        }
    }
    else{
        errorProductName = "* Product Name is mandatory.";
        document.getElementById("addproductnameerror").innerHTML = errorProductName;
        return false;
    }

    //validating product description
    var pd = document.getElementById("addproductdescription").value;
    var errorAddProductDescription = "";
    document.getElementById("addproductdescriptionerror").innerHTML = errorAddProductDescription;
    if (pd == "") {
        errorAddProductDescription = "* Product Description is mandatory.";
        document.getElementById("addproductdescriptionerror").innerHTML = errorAddProductDescription;
        return false;
    }

    //validating product image url
    var pi = document.getElementById("addproductimage").value;
    var errorAddProductImage = "";
    document.getElementById("addproductimageerror").innerHTML = errorAddProductImage;
    if (pi == "") {
        errorAddProductImage = "* Product Image is mandatory.";
        document.getElementById("addproductimageerror").innerHTML = errorAddProductImage;
        return false;
    }

    //validating price
    var pp = document.getElementById("addproductprice").value;
    var errorProductPrice = "";
    document.getElementById("addproductpriceerror").innerHTML = errorProductPrice;
    if (pp == "") {
        errorProductPrice = "* Product Price is mandatory.";
        document.getElementById("addproductpriceerror").innerHTML = errorProductPrice;
        return false;
    }

return true;
}



// validation of special sales
function addspecialsalesform(){
    //validating product selection list




    //validating start date
    var sd = document.getElementById("addstartdate").value;
    var errorStartDate = "";
    document.getElementById("addstartdateerror").innerHTML = errorStartDate;
    if (sd == "") {
        errorStartDate = "* Start Date is mandatory.";
        document.getElementById("addstartdateerror").innerHTML = errorStartDate;
        return false;
    }

    //validating end date
    var ed = document.getElementById("addenddate").value;
    var errorEndDate = "";
    document.getElementById("addenddateerror").innerHTML = errorEndDate;
    if (ed == "") {
        errorEndDate = "* End Date is mandatory.";
        document.getElementById("addenddateerror").innerHTML = errorEndDate;
        return false;
    }

    //validating ed is greater than sd
    var errorCompDate = "";
    document.getElementById("addcompdateerror").innerHTML = errorCompDate;
    if ((Date.parse(sd) >= Date.parse(ed))) {
        errorCompDate = "* End Date should be later than Start Date.";      
        document.getElementById("addcompdateerror").innerHTML = errorCompDate;
        return false;
    }

    //validating discount price percentage
    var dp = document.getElementById("adddiscount%").value;
    var errorDiscount = "";
    document.getElementById("adddiscounterror").innerHTML = errorDiscount;
    if (dp == "") {
        errorDiscount = "* Product Discount is mandatory.";
        document.getElementById("adddiscounterror").innerHTML = errorDiscount;
        return false;
    }

    return true;
}



//validation for selecting edit product
function editproductform1(){
    // validating radio buttons, whether a product is selected to edit or not
    var chkvalue = 0;
    var errorEdit = "";
    document.getElementById("editerror").innerHTML = errorEdit;
    var elem = document.forms['editproductform'].elements['edit'];
    len = elem.length - 1;
    for(i=0; i<=len; i++){
        if(elem[i].checked == true){ chkvalue = 1; return true; }
    }
    if(chkvalue == 0){ 
        errorEdit = "* Select a product in order to edit.";
        document.getElementById("editerror").innerHTML = errorEdit;
        return false;
    }
}



//
function editproductform2(){
    //validating product name
    var pn = document.getElementById("editproductname").value;
    var errorProductName = "";
    document.getElementById("editproductnameerror").innerHTML = errorProductName;
    if (pn != "") {
        if (pn.match(nameletters)) { ; }
        else {
            pn = "";
            errorProductName = "* Product Name should have alphabets, spaces only. Max 50 letters.";
            document.getElementById("editproductnameerror").innerHTML = errorProductName;
            return false;
        }
    }
    else{
        errorProductName = "* Product Name is mandatory.";
        document.getElementById("editproductnameerror").innerHTML = errorProductName;
        return false;
    }

    //validating product description
    var pd = document.getElementById("editproductdescription").value;
    var errorEditProductDescription = "";
    document.getElementById("editproductdescriptionerror").innerHTML = errorEditProductDescription;
    if (pd == "") {
        errorEditProductDescription = "* Product Description is mandatory.";
        document.getElementById("editproductdescriptionerror").innerHTML = errorEditProductDescription;
        return false;
    }

    //validating product image url
    var pi = document.getElementById("editimageurl").value;
    var errorEditProductImage = "";
    document.getElementById("editproductimageerror").innerHTML = errorEditProductImage;
    if (pi == "") {
        errorEditProductImage = "* Product Image is mandatory.";
        document.getElementById("editproductimageerror").innerHTML = errorEditProductImage;
        return false;
    }

    //validating price
    var pp = document.getElementById("editproductprice").value;
    var errorProductPrice = "";
    document.getElementById("editproductpriceerror").innerHTML = errorProductPrice;
    if (pp == "") {
        errorProductPrice = "* Product Price is mandatory.";
        document.getElementById("editproductpriceerror").innerHTML = errorProductPrice;
        return false;
    }

    return true;
}



//validation for selecting edit product
function editspecialsalesform1(){
    // validating radio buttons, whether a product is selected to edit or not
    var chkvalue = 0;
    var errorEdit = "";
    document.getElementById("editerror").innerHTML = errorEdit;
    var elem = document.forms['editspecialsalesform'].elements['edit'];
    len = elem.length - 1;
    for(i=0; i<=len; i++){
        if(elem[i].checked == true){ chkvalue = 1; return true; }
    }
    if(chkvalue == 0){ 
        errorEdit = "* Select a special sale in order to edit.";
        document.getElementById("editerror").innerHTML = errorEdit;
        return false;
    }
}



//validation for editing product
function editspecialsalesform2(){
    //validating start date
    var sd = document.getElementById("editstartdate").value;
    var errorStartDate = "";
    document.getElementById("editstartdateerror").innerHTML = errorStartDate;
    if (sd == "") {
        errorStartDate = "* Start Date is mandatory.";
        document.getElementById("editstartdateerror").innerHTML = errorStartDate;
        return false;
    }

    //validating end date
    var ed = document.getElementById("editenddate").value;
    var errorEndDate = "";
    document.getElementById("editenddateerror").innerHTML = errorEndDate;
    if (ed == "") {
        errorEndDate = "* End Date is mandatory.";
        document.getElementById("editenddateerror").innerHTML = errorEndDate;
        return false;
    }

    //validating ed is greater than sd
    var errorCompDate = "";
    document.getElementById("editcompdateerror").innerHTML = errorCompDate;
    if ((Date.parse(sd) >= Date.parse(ed))) {
        errorCompDate = "* End Date should be later than Start Date.";      
        document.getElementById("editcompdateerror").innerHTML = errorCompDate;
        return false;
    }

    //validating discount price percentage
    var dp = document.getElementById("editdiscount%").value;
    var errorDiscount = "";
    document.getElementById("editdiscounterror").innerHTML = errorDiscount;
    if (dp == "") {
        errorDiscount = "* Product Discount is mandatory.";
        document.getElementById("editdiscounterror").innerHTML = errorDiscount;
        return false;
    }

    return true;
}



//validation of delete product
function deleteproductform(a){
    //validation of checkboxes
    var check = 0; var i=0; 
    var errorDelete = "";
    document.getElementById("deleteerror").innerHTML = errorDelete;
    while(i<a){
        if(document.getElementById(i).checked == true){ 
            check = 1; 
            var k = confirm("Do you really want to delete ?");
            if(k == true){ return true; }
            else { return false; }
        }
        i++;
    }
    if(check == 0){
        errorDelete = "* Select atleast one product in order to delete.";
        document.getElementById("deleteerror").innerHTML = errorDelete;
        return false;
    }
}



//validation of delete special sale
function deletespecialsalesform(a){
    //validation of checkboxes
    var check = 0; var i=0; 
    var errorDelete = "";
    document.getElementById("deleteerror").innerHTML = errorDelete;
    while(i<a){
        if(document.getElementById(i).checked == true){
            check = 1; 
            var k = confirm("Do you really want to delete ?");
            if(k == true){ return true; }
            else { return false; }
        }
        i++;
    }
    if(check == 0){
        errorDelete = "* Select atleast one special sale in order to delete.";
        document.getElementById("deleteerror").innerHTML = errorDelete;
        return false;
    }
}

function comparedates(){
    var errormsg = "";
    var sd = document.getElementById("startdate").value;
    var ed = document.getElementById("enddate").value;
    //validating ed is greater than sd
    document.getElementById("error").innerHTML = errormsg;
    if ((Date.parse(sd) >= Date.parse(ed))) {
        errormsg = "* End Date should be later than Start Date.";      
        document.getElementById("error").innerHTML = errormsg;
        return false;
    }
}