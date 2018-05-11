// Add Record 
function addRecord() {
    // get values
    var matrcol = $("#matr_col").val();
    var nomecol = $("#nome_col").val();
    var emailcol = $("#email_col").val();
    var senhacol = $("#senha_col").val();
    var admcol = 0;

    if ($('#update_adm').is(":checked"))
    {
        var admcol = 1;
    }
    // Add record
    $.post("ajax/AddColaborador.php", {
        matr_col: matrcol,
        nome_col: nomecol,
        email_col: emailcol,
        senha_col: senhacol,
        adm_col: admcol      
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#matr_col").val("");
        $("#nome_col").val("");
        $("#email_col").val("");
        $("#senha_col").val("");
        document.getElementById("update_adm").checked = false;

        //Tratando retorno
        if(data.startsWith("Erro")) {
           $("#erro_box").show();
           $("#erro_message").html(data);
           }
        else {
            $("#alert_box").show();
            $("#alert_message").html(data);
        }

    });
}

// READ records
function readRecords() {
    $.get("ajax/ReadColaboradores.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function DeleteUser(id) {
    var conf = confirm("Você tem certeza que deseja realmente excluir este colaborador?");
    if (conf == true) {
        $.post("ajax/deleteColaborador.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
              
                readRecords();

                //Tratando retorno
                $("#erro_box").show();
                $("#erro_message").html(data);
                
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readColDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var colaborador = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_col_matricula").prop("disabled", true);            
            $("#update_col_matricula").val(colaborador.matr_col);
            $("#update_col_name").val(colaborador.nome_col);
            $("#update_col_email").val(colaborador.email_col);

            //Tratando retorno do checkbox
            if (colaborador.adm_col==1)
                document.getElementById("update_adm").checked = true
            else 
                document.getElementById("update_adm").checked = false;
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var col_name = $("#update_col_name").val();
    var col_email = $("#update_col_email").val();
    var col_senha = $("#update_col_senha").val();

    var col_adm = 0;

    if ($('#update_adm').is(":checked"))
    {
        var col_adm = 1;
    }

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateColDetails.php", {
            matricula: id,
            colaborador: col_name,
            email: col_email,
            senha: col_senha,
            adm: col_adm
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();

            //Tratando retorno
            if(data.startsWith("Erro")) {
                $("#erro_box").show();
                $("#erro_message").html(data);
                }
            else {
                $("#alert_box").show();
                $("#alert_message").html(data);
            }            
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    $("#alert_box").hide();
    $("#erro_box").hide();
    readRecords(); // calling function
});