/* =====================================
   CAMPUS EVENT MANAGEMENT SYSTEM
   JAVASCRIPT
===================================== */



// =====================================
// PASSWORD SHOW / HIDE
// =====================================


function togglePassword(id)

{


    let password = document.getElementById(id);



    if(password.type === "password")

    {

        password.type = "text";

    }

    else

    {

        password.type = "password";

    }


}






// =====================================
// DELETE CONFIRMATION
// =====================================


function confirmDelete()

{


    return confirm(

        "Are you sure you want to delete?"

    );


}







// =====================================
// FORM VALIDATION
// =====================================


function validateForm(formId)

{


    let form = document.getElementById(formId);



    let inputs = form.querySelectorAll(

        "input[required], textarea[required], select[required]"

    );



    for(let i=0;i<inputs.length;i++)

    {


        if(inputs[i].value.trim()==="")

        {


            alert(

                "Please fill all required fields"

            );


            inputs[i].focus();


            return false;


        }


    }



    return true;


}







// =====================================
// AJAX SEARCH SYSTEM
// =====================================


function ajaxSearch(

    inputId,

    action,

    tableId

)

{


    let searchBox = document.getElementById(inputId);



    if(!searchBox)

    {

        return;

    }





    searchBox.addEventListener(

        "keyup",

        function()

        {



            let keyword = this.value;





            fetch(

                "index.php?page=ajax&action="+action+"&keyword="+keyword

            )



            .then(

                response => response.json()

            )



            .then(

                data =>

                {


                    document.getElementById(tableId).innerHTML = data.html;


                }

            )



            .catch(

                error => console.log(error)

            );



        }


    );


}









// =====================================
// AUTO HIDE ALERT
// =====================================


setTimeout(

function()

{


    let alerts = document.querySelectorAll(".alert");



    alerts.forEach(

        function(alert)

        {

            alert.style.display="none";

        }

    );


},

5000

);