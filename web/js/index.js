$(function () {

    $("#searchResultBlock").show(1000);
    $("input[name='fullName']").bind("change keydown click", function() {
        $(".category option[value='']").prop("selected", "selected");
        if ($("input[name='fullName']").val() != "") {
            searchTeacherByName();
            $("#searchResultBlock").html("");
            $("#aboutTeacherList").hide(500);
            $("#profileTitle").hide(500);
        }
    });
    $('.category').bind("change", function () {
        $("input[name='fullName']").val('');
        $("#searchResultBlock").html("");
        searchTeacherByCategory();
        $("#aboutTeacherList").hide(500);
        $("#profileTitle").hide(500);
    });

    $(".navButtons").click(function() {
        var str = $(this).val();
        $.scrollTo(str, 1300);
        if ($("#nav-bar").width <= "570px") {
            $("#navButtonsList").animate({height: "hide"}, 300);
            $("#nav-icon").toggleClass('open');
        }
    });


    $('.contactField').bind('change', function () {
        $("#contactButton").click(function () {
            if (validateContactData()) {
                addComment();
                $("#messageBlock").html('Відгук відправлено').show(500);
            } else
                $("#messageBlock").html('Неможливо відправити відгук').show(500);
        });
    });

});

function searchTeacherByName() {
    var fullName = $("input[name='fullName']").val();
    $.ajax({
        type: "GET",
        url: "SearchController/nameAction",
        data: {fullName: fullName},
        response: "text",
        success: function (data) {
            $("#searchResultBlock").html(data);
            $(".teacherItem").click(function () {
                $("#profile").hide(500);
                selectTeacher(this);
                $.scrollTo("#teacherProfileBlock", 500);
            });
        }
    });
}

function searchTeacherByCategory() {
    var url,
        searchArgs,
        controllerName = "SearchController/";
    var args = {
        subject: $("select[name='subject']").val(),
        institution: $("select[name='institution']").val(),
        rank: $("select[name='rank']").val()
    };

    if (args['subject'] != "" && args['institution'] != "" && args['rank'] != "") {
        url = controllerName + "subjectAndInstitutionAndRankAction";
        searchArgs = {
            subject: args['subject'],
            institution: args['institution'],
            rank: args['rank']
        };
    } else if (args['subject'] != "" && args['institution'] != "") {
        url = controllerName + "subjectAndInstitutionAction";
        searchArgs = {
            subject: args['subject'],
            institution: args['institution']
        }
    } else if (args['subject'] != "" && args['rank'] != "") {
        url = controllerName + "subjectAndRankAction";
        searchArgs = {
            subject: args['subject'],
            rank: args['rank']
        }
    } else if (args['institution'] != "" && args['rank'] != "") {
        url = controllerName + "institutionAndRankAction";
        searchArgs = {
            institution: args['institution'],
            rank: args['rank']
        }
    } else if (args['subject'] != "") {
        url = controllerName + "subjectAction";
        searchArgs = {subject: args['subject']}
    } else if (args['institution'] != "") {
        url = controllerName + "institutionAction";
        searchArgs = {institution: args['institution']}
    } else if (args['rank'] != "") {
        url = controllerName + "rankAction";
        searchArgs = {rank: args['rank']}
    } else {
        url = controllerName + "nullAction";
        searchArgs = {arg: 0}
    }
    $.ajax({
        type: "GET",
        url: url,
        data: searchArgs,
        response: "text",
        success: function (data) {
            $("#searchResultBlock").html(data);
            $(".teacherItem").click(function () {
                $("#aboutTeacherList").hide(500);
                // $("#searchResultTitle").hide(500);
                selectTeacher(this);
                $.scrollTo("#teacherProfileBlock", 500);
            });
        }
    });
}

function selectTeacher(object) {
    var id = $(object).attr("id").replace(/[^0-9]/g, "");
    $.ajax({
        type: "GET",
        url: "TeacherController/readAction",
        data: {id: id},
        response: "text",
        success: function (data) {
            $("#teacherProfileBlock").html(data);
            $("#aboutTeacherList").show(500);
            // $("#searchResultTitle").show(500);
        }
    })
}

function addComment() {
    var content = $("#contactMessage").val(),
        author = $("#authorCommentName").val();
    // alert(content+" "+author);
    $.ajax({
        type: "POST",
        url: "CommentController/createAction",
        data: {
            'content': content,
            'author': author
        },
        response: "text",
        success: function () {
            // $("#messageBlock").html(data);
        }
    })
}