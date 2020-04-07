// HomeView
if (window.location.href.indexOf('/home') > 0) {
    function getDataHome() {
        $.ajax({
            type: "GET",
            url: "data_home",
            success: function (result) {
                var obj = jQuery.parseJSON(result);
                $("#item_count").html(obj.item_count);
                $("#matching_count").html(obj.games_count.matching_count);
                $("#puzzle_count").html(obj.games_count.puzzle_count);
                $("#quiz_count").html(obj.games_count.quiz_count);
                $("#mole_count").html(obj.games_count.mole_count);
                $("#cosmos_count").html(obj.games_count.cosmos_count);
            }
        });
    }
    setTimeout(getDataHome)
    setInterval(getDataHome, 5000);   // 1000 = 1 second
}

// AddView
if (window.location.href.indexOf('/add') > 0) {
    function getDataAdd() {
        $(document).ready(function () {
            $.getJSON("data_add", function (result) {
                // var obj = jQuery.parseJSON(result);


                $("#games").empty();
                $.each(result.games, function (key, val) {
                    var option = "<option value=" + val["game_id"] + ">";
                    option = option + val["game_name"];
                    option = option + "</option>";
                    $('#games').append(option);
                });
            });
        });
        $(document).ready(function () {
            $.getJSON("data_add", function (data) {
                $('#example').DataTable({
                    "data": data.items,
                    columns: [
                        { "data": "sequence" },
                        {
                            "data": function (data) {
                                return '<img src="' + data.pic_path + '">';

                            }
                        },
                        { "data": "obj_title" },
                        {
                            "data": function (data) {
                                return '<div class="form-check">' +
                                    '<label class="form-check-label">' +
                                    '<input type="checkbox" class="form-check-input checkbox" name="item[]" id="item[]" value="' + data.sequence + '" > เลือก <i class="input-helper"></i>' +
                                    '</label>' +
                                    '</div>';
                            }
                        }
                    ]
                });
            });
        });
    }

    function postFormAdd() {

        var game = $("#games").val()
        var items = $('input:checked').map(function () {
            return $(this).val();
        });
        item = items.get();
        if (item.length == 0) {
            var formData = { gameId: game, items: [null] };
        } else {
            var formData = { gameId: game, items: item };
        }
        // console.log(formData);
        if (item.length == 8 && game != "1") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: "post_add",
                    type: "POST",
                    data: formData,
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        if (data.success == "success") {
                            swal({
                                title: "สำเร็จ",
                                text: "บันทึกข้อมูลสำเร็จ",
                                icon: "success",
                                timer: 3000,
                                button: false,
                            });
                        } else if (data.success == "unsuccessful") {
                            swal({
                                title: "ไม่สำเร็จ",
                                text: "บันทึกข้อมูลไม่สำเร็จ",
                                icon: "error",
                                button: "ตกลง",
                            });
                        } else if (data.success == "error") {
                            swal({
                                title: "ไม่สำเร็จ",
                                text: "ระบบมีปัญหาในการสร้างไฟล์ข้อมูล",
                                icon: "error",
                                button: "ตกลง",
                            });
                        } else if (data.success == "warning") {
                            swal({
                                title: "ไม่สำเร็จ",
                                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากเงื่อนไขในการบันทึกไม่ถูกต้อง",
                                icon: "warning",
                                button: "ตกลง",
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR);
                    }
                });
        } else if (item.length < 8 && game != "1") {
            swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากจำนวนข้อมูลที่เลือกไม่ถึง 8 ข้อมูล",
                icon: "warning",
                button: true,
            });
        } else if (item.length > 8 && game != "1") {
            swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากจำนวนข้อมูลที่เลือกมากกว่า 8 ข้อมูล",
                icon: "warning",
                button: true,
            });
        } else if (game == "1") {
            swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถบันทึกข้อมูลได้ เนื่องจากไม่ได้เลือกเกม",
                icon: "warning",
                button: true,
            });
        }

    }
    setTimeout(getDataAdd)

    $('#submit_add').on('click', function () {
        $("table").DataTable().destroy()
        setTimeout(getDataAdd)
        postFormAdd();
    });


}


// Delect View
if (window.location.href.indexOf('/delect') > 0) {
    function getDataAdd() {
        $(document).ready(function () {
            $.getJSON("data_add", function (result) {
                // var obj = jQuery.parseJSON(result);
                $("#games").empty();
                $.each(result.games, function (key, val) {
                    var option = "<option value=" + val["game_id"] + ">";
                    option = option + val["game_name"];
                    option = option + "</option>";
                    $('#games').append(option);
                });
            });
            var div = '<div class="col-md-12 text-center"><h4>ไม่พบข้อมูล</h4></div>';
            $('#data_delect').html(div);
        });
    }
    function searchFormDelect() {

        var game = $("#games").val()
        var formData = { gameId: game };
        // console.log(game);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "searc_delect",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    // console.log(data);
                    $.each(data, function (key, val) {
                        console.log(val.success);

                        if (val.success == "success") {
                            var div = '<div class="col-12 col-md-4 grid-margin stretch-card">' +
                                '<div class="card">' +
                                ' <div class="card-body remake">' +
                                ' <h4 class="card-title">' + val.item['Id'] + '</h4>' +
                                '<hr>' +
                                '<div class="template-demo">' +

                                '<button type="submit" class="btn btn-gradient-danger btn-fw  mr-1" onclick="postFormDelect(this)" id="set_game" value="' + val.item['Id'] + '">ลบชุดข้อมูล</button>' +

                                '<button type="submit" class="btn btn-light btn-fw " onclick="search_data_game(this)" value="' + val.item['Id'] + '">ดูข้อมูล</button>' +

                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            var $appendElem = $(div);
                            $appendElem.appendTo('#data_delect');
                        } else if (val.success == "warning") {
                            var div = '<div class="col-md-12 text-center"><h4>ไม่พบข้อมูล</h4></div>';
                            $('#data_delect').html(div);
                        }

                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR);
                }
            });

    }
    function postFormDelect(e) {

        var Id = $(e).val()
        var formData = { Id: Id };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "post_delect",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (data.success == "success") {
                        swal({
                            title: "สำเร็จ",
                            text: "ลบข้อมูลสำเร็จ",
                            icon: "success",
                            timer: 3000,
                            button: false,
                        });
                    } else if (data.success == "unsuccessful") {
                        swal({
                            title: "ไม่สำเร็จ",
                            text: "ลบข้อมูลไม่สำเร็จ",
                            icon: "error",
                            button: "ตกลง",
                        });
                    }
                    $('#data_delect').html('');
                    searchFormDelect()
                }
            });

    }


    setTimeout(getDataAdd)

    $('#search_game').on('click', function () {

        $('#data_delect').html('');
        searchFormDelect();
    });

    function search_data_game(e) {
        var Id = $(e).val()
        var formData = { Id: Id };
        // console.log(formData);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
            {
                url: "search_data_game",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR) {
                    $.getJSON(data['Url'], function(data) {
                        console.log(data);
                    });
                }
            });
    }
}