$(function () {

    $("#commentsButton").click(function () {
        $.ajax({
            type: "GET",
            url: "AdminController/showNewCommentsAction",
            response: "text",
            success: function (data) {
                $('#contentBlock').html(data).show(500);

                $('.approve').click(function () {
                    var id = $(this).attr('id').replace(/[^0-9]/g, "");
                    $.ajax({
                        type: "POST",
                        url: "AdminController/checkNewCommentAction",
                        data: {
                            idComment: id,
                            estimate: true
                        },
                        response: "text",
                        success: function (data) {
                            $('#message_' + id).html(data).show(500);
                        }
                    })
                });

                $('.disapprove').click(function () {
                    var id = $(this).attr('id').replace(/[^0-9]/g, "");
                    $.ajax({
                        type: "POST",
                        url: "AdminController/checkNewCommentAction",
                        data: {
                            idComment: id,
                            estimate: 0
                        },
                        response: "text",
                        success: function (data) {
                            $('#message_' + id).html(data).show(500);
                        }
                    })
                })
            }
        })
    });

    $("#searchButton").click(function () {
        $.ajax({
            type: "GET",
            url: "PageController/searchAction",
            response: "text",
            success: function (data) {
                $('#contentBlock').html(data);
                $("#searchField").bind("change keydown click", function () {
                    if ($("#searchField").val() !== '')
                        $.ajax({
                        type: "POST",
                        url: "AdminController/findTeachersAction",
                        data: {"name": $("#searchField").val()},
                        response: "text",
                        success: function (data) {
                            $('#searchResultBlock').html(data).show(500);

                            $('.teacherItem').click(function () {
                                var id = $(this).attr('id').replace(/[^0-9]/g, "");
                                $.ajax({
                                    type: 'GET',
                                    url: "AdminController/selectTeacherOnceAction",
                                    data: {id: id},
                                    response: "text",
                                    success: function (data) {
                                        $('#teacherProfileBlock').html(data).show(500);

                                        $('#update').click(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: "TeacherController/updateAction",
                                                data: {
                                                    idTeacher: id,
                                                    fullName: $("#fullName").val(),
                                                    category: $("#category").val(),
                                                    position: $("#position").val(),
                                                    rank: $("#rank").val(),
                                                    institution: $("#institution").val(),
                                                    ppd: $("#ppd").val()
                                                },
                                                response: "text",
                                                success: function (data) {
                                                    $("#message").html(data).show(500);
                                                }
                                            })
                                        });

                                        $('#delete').click(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: "TeacherController/deleteAction",
                                                data: {idTeacher: id},
                                                response: "text",
                                                success: function (data) {
                                                    $("#message").html(data).show(500);
                                                }
                                            })
                                        })
                                    }
                                })
                            })
                        }
                    })
                })
            }
        })
    });

    $("#createButton").click(function () {

        $.ajax({
            type: "GET",
            url: "PageController/createTeacherAction",
            response: "text",
            success: function (data) {
                $("#contentBlock").html(data);

                $("#create").click(function () {
                    $.ajax({
                        type: "POST",
                        url: "TeacherController/createAction",
                        data: {
                            fullName: $("#fullName").val(),
                            category: $("#category").val(),
                            position: $("#position").val(),
                            rank: $("#rank").val(),
                            institution: $("#institution").val(),
                            ppd: $("#ppd").val()
                        },
                        response: "text",
                        success: function (data) {
                            $("#message").html(data).show(500);
                            $(".field").val('');
                        }
                    })
                });

            }
        });
    });

    $("#addSubjectButton").click(function () {
        $.ajax({
            type: "GET",
            url: "PageController/addSubjectAction",
            response: "text",
            success: function (data) {
                $("#contentBlock").html(data);

                $("#add").click(function () {
                    $.ajax({
                        type: "POST",
                        url: "TeacherController/addSubjectAction",
                        data: {
                            idTeacher: $("#fullName").val(),
                            subject: $("#subject").val()
                        },
                        response: "text",
                        success: function (data) {
                            $("#message").html(data).show(500);
                            $(".field").val('');
                        }
                    })
                });
            }
        })
    });

    $("#addPhotoButton").click(function () {
        $.ajax({
            type: "GET",
            url: "PageController/addPhotoAction",
            response: "text",
            success: function (data) {
                $("#contentBlock").html(data);
            }
        })
    })
});