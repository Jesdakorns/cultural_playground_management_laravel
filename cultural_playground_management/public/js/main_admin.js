// dashboard
if (window.location.href.indexOf('admin/dashboard') > 0) {
    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: " ../api_admin/api_user",
            success: function (result) {

                $('#example').DataTable({
                    "data": result,
                    columns: [
                        { "data": "sequence" },
                        {
                            "data": function (data) {

                                return '<img src="' + data.image + '">';

                            }
                        },
                        { "data": "museum" },
                        { "data": "email" },
                        { "data": "password" }
                    ]
                });
            }
        });
    });
}

// manage_members
if (window.location.href.indexOf('admin/manage_members') > 0) {
    function getUsers() {

        $.ajax({
            type: "GET",
            url: " ../api_admin/api_user",
            success: function (result) {
                // console.log(result);

                $('#example').DataTable({
                    "data": result,
                    columns: [
                        { "data": "sequence" },
                        {
                            "data": function (data) {
                                // console.log(data);

                                return '<img src="' + data.image + '">';

                            }
                        },
                        { "data": "museum" },
                        { "data": "email" },
                        { "data": "password" },
                        {
                            "data": function (data) {
                                return '<div class="form-check">' +
                                    '<label class="form-check-label">' +
                                    ' <button type="button" id="edit_user" name="edit_user" value="' + data.id + '" onclick="edit_user(this)" data-toggle="modal" data-target="#exampleModalEditUser" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></button>' +
                                    ' <button type="button" id="delect_user" name="delect_user" value="' + data.id + '" onclick="delect_user(this)"  class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></button>' +
                                    '</label>' +
                                    '</div>';
                            }
                        }
                    ]
                });
            }
        });

    }
    setTimeout(getUsers)
    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: " ../api_admin/api_museum_code",
            success: function (result) {
                $("#museum_code").empty();
                $.each(result, function (key, val) {

                    var option = "<option value=" + val["museum_code"] + ">";
                    option = option + val["museum_code"] + ":" + val["museum_name"];
                    option = option + "</option>";
                    $('#museum_code').append(option);
                });
            }
        });

    });


    $('#add_user').on('click', function () {
        var name = $("#name").val()
        var email = $("#email").val()
        var password = $("#password").val()
        var museum_code = $("#museum_code").val()
        var password_confirm = $("#password-confirm").val()
        var formData = { name: name, email: email, password: password, museum_code: museum_code };

        var emailFilter = /^.+@.+\..{2,3}$/;
        if (name == "") {
            document.getElementById("name").style.border = "solid 1px red";
            var check_name = false;
        } else {
            document.getElementById("name").style.border = "solid 1px green";
            var check_name = true;
        }
        if (email == "" || !(emailFilter.test(email))) {
            document.getElementById("email").style.border = "solid 1px red";
            var check_email = false;
        } else {
            document.getElementById("email").style.border = "solid 1px green";
            var check_email = true;
        }
        if (password == "") {
            document.getElementById("password").style.border = "solid 1px red";
            var check_password = false;
        } else {
            document.getElementById("password").style.border = "solid 1px green";
            var check_password = true;
        }
        if (password_confirm == "" || password != password_confirm) {
            document.getElementById("password-confirm").style.border = "solid 1px red";
            var check_password_confirm = false;
        } else {
            document.getElementById("password-confirm").style.border = "solid 1px green";
            var check_password_confirm = true;
        }
        if (check_name && check_email && check_password && check_password_confirm == true) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: "manage_members",
                    type: "POST",
                    data: formData,
                    success: function (data, textStatus, jqXHR) {
                        $("table").DataTable().destroy();
                        setTimeout(getUsers);
                        ClearInputValue("input[type=text],input[type=email], input[type=checkbox], select, input[type=radio],input[type=password]");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR);
                    }
                });

        }
    });

    function edit_user(e) {
        var user_id = $(e).val()


        var formData = { user_id: user_id };


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "../api_admin/api_data_user/" + user_id,
                type: "GET",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    document.getElementById("save_edit_user").value = data.id;
                    document.getElementById("edit_name").value = data.name;
                    document.getElementById("edit_email").value = data.email;

                    $.ajax({
                        type: "GET",
                        url: " ../api_admin/api_museum_code",
                        success: function (result) {

                            $("#edit_museum_code").empty();
                            $.each(result, function (key, val) {

                                var option = "<option value=" + val["museum_code"] + ">";
                                option = option + val["museum_code"] + ":" + val["museum_name"];
                                option = option + "</option>";
                                $('#edit_museum_code').append(option);
                            });
                        }
                    });
                }

            });
    }
    $('#save_edit_user').on('click', function () {
        var edit_id = document.getElementById("save_edit_user").value;
        var edit_name = $("#edit_name").val()
        var edit_email = $("#edit_email").val()
        var edit_password = $("#edit_password").val()
        var edit_museum_code = $("#edit_museum_code").val()
        var formData = { edit_id: edit_id, edit_name: edit_name, edit_email: edit_email, edit_password: edit_password, edit_museum_code: edit_museum_code };

        var edit_emailFilter = /^.+@.+\..{2,3}$/;
        if (edit_name == "") {
            document.getElementById("edit_name").style.border = "solid 1px red";
            var check_name = false;
        } else {
            document.getElementById("edit_name").style.border = "solid 1px green";
            var check_name = true;
        }
        if (edit_email == "" || !(edit_emailFilter.test(edit_email))) {
            document.getElementById("edit_email").style.border = "solid 1px red";
            var check_email = false;
        } else {
            document.getElementById("edit_email").style.border = "solid 1px green";
            var check_email = true;
        }
        if (edit_password == "") {
            document.getElementById("edit_password").style.border = "solid 1px red";
            var check_password = false;
        } else {
            document.getElementById("edit_password").style.border = "solid 1px green";
            var check_password = true;
        }
        if (check_name && check_email && check_password == true) {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: "edit_manage_user",
                    type: "POST",
                    data: formData,
                    success: function (data, textStatus, jqXHR) {

                        window.location.reload()
                    }

                });
        }

    });
    function delect_user(e) {
        var user_id = $(e).val()
        var formData = { user_id: user_id };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "delete_manage_user",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    $('#exampleModalEdit').modal('hide');
                    $("table").DataTable().destroy();
                    setTimeout(getUsers);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR);
                }

            });
    }
}
//manage_games
if (window.location.href.indexOf('admin/manage_games') > 0) {
    function getGames() {

        $.ajax({
            type: "GET",
            url: " ../api_admin/api_game",
            success: function (result) {


                $('#example').DataTable({
                    "data": result,
                    columns: [
                        { "data": "sequence" },
                        { "data": "game_id" },
                        { "data": "game_name" },
                        { "data": "game_url" },
                        {
                            "data": function (data) {
                                return '<div class="form-check">' +
                                    '<label class="form-check-label">' +
                                    ' <button type="button" id="edit_game" name="edit_game" value="' + data.id + '" onclick="edit_game(this)" data-toggle="modal" data-target="#exampleModalEdit" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></button>' +
                                    ' <button type="button" id="delect_game" name="delect_game" value="' + data.id + '" onclick="delect_game(this)" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></button>' +
                                    '</label>' +
                                    '</div>';
                            }
                        }
                    ]
                });
            }
        });

    }
    setTimeout(getGames)

    $('#add_game').on('click', function () {

        var game_name = $("#game_name").val()
        var game_address = $("#game_address").val()
        var formData = { game_name: game_name, game_address: game_address };
        if (game_name == "") {
            document.getElementById("game_name").style.border = "solid 1px red";
            var check_game_name = false;
        } else {
            document.getElementById("game_name").style.border = "solid 1px green";
            var check_game_name = true;
        }
        if (game_address == "") {
            document.getElementById("game_address").style.border = "solid 1px red";
            var check_game_address = false;
        } else {
            document.getElementById("game_address").style.border = "solid 1px green";
            var check_game_address = true;
        }

        if (check_game_name && check_game_address == true) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: "manage_games",
                    type: "POST",
                    data: formData,
                    success: function (data, textStatus, jqXHR) {

                        $("table").DataTable().destroy();
                        setTimeout(getGames);
                        ClearInputValue("input[type=text]");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR);
                    }
                });
        }
    });


    function edit_game(e) {
        var game_id = $(e).val()


        var formData = { game_id: game_id };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "../api_admin/api_data_game/" + game_id,
                type: "GET",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    document.getElementById("save_edit_game").value = data.id;
                    document.getElementById("edit_game_id").value = data.game_id;
                    document.getElementById("edit_game_name").value = data.game_name;
                    document.getElementById("edit_game_address").value = data.game_url;
                }

            });
    }

    $('#save_edit_game').on('click', function () {
        var edit_id = document.getElementById("save_edit_game").value;
        var edit_game_id = $("#edit_game_id").val()
        var edit_game_name = $("#edit_game_name").val()
        var edit_game_address = $("#edit_game_address").val()
        var formData = { edit_id: edit_id, edit_game_id: edit_game_id, edit_game_name: edit_game_name, edit_game_address: edit_game_address };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "edit_manage_game",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    $('#exampleModalEdit').modal('hide');
                    $("table").DataTable().destroy();
                    setTimeout(getGames);
                }

            });
    });

    function delect_game(e) {
        var game_id = $(e).val()
        var formData = { game_id: game_id };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "delete_manage_game",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    $('#exampleModalEdit').modal('hide');
                    $("table").DataTable().destroy();
                    setTimeout(getGames);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR);
                }

            });
    }


}


function ClearInputValue(control) {
    $(control).each(function () {
        if (($(this)[0].type == "text") || ($(this)[0].type == "password") || ($(this)[0].type == "email")) {
            $(this).val('');
        } else if ($(this)[0].type == "checkbox") {
            this.checked = false;
        } else if ($(this)[0].type == "select-one") {
            $(this)[0].selectedIndex = 0;
        } else if ($(this)[0].type == "radio") {
            $(this).prop('checked', false);
        }
    });
}