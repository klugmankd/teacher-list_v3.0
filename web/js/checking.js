$(function () {
    $('.field').bind('change', function () {
        if (validateAuthData())
            $('#loginButton').css({display: "inline-block"});
        else
            $('#loginButton').hide();
    });

});

var regExp = {
    username: /^[a-zA-Z][a-zA-Z0-9-_.]{1,20}$/,
    password: /^[a-zA-Z0-9]+$/,
    name: /^[а-яіїєА-ЯІЇЄa-zA-Z\s]+$/
};

function getAuthData() {
    var username,
        password,
        form,
        result;

    form = document.getElementById('authForm');
    username = form.login.value;
    password = form.password.value;

    result = {
        username: username,
        password: password
    };

    return result;
}

function getContactData() {
    var authorName,
        message,
        result;

    // authorName = document.getElementById('authorCommentName').value;
    authorName = $('#authorCommentName').val();
    message = $('#contactMessage').val();
    // message = document.getElementById('message').value;
    //
    result = {
        name: authorName,
        message: message
    };

    return result;
}

function validateContactData() {
    var data = getContactData(),
        name = document.getElementById('authorCommentName'),
        message = document.getElementById('contactMessage'),
        checking,
        result;

    checking = regExp['name'].test(data['name']);

    if (checking) {
        name.className = "contactFieldIsValid";
    } else if (data['name'] == '') {
        name.className = 'contactField'
    } else {
        name.className = "contactFieldIsNotValid"
    }

    if (data['message'] !== '') {
        message.className = "contactFieldIsValid"
    } else {
        message.className = "contactFieldIsNotValid"
    }

    result = checking && data['message'];

    return result;
}

function validateAuthData() {
    var data = getAuthData(),
        result = true,
        message = 'Введено некоректно',
        checking;

    checking = {
        username: regExp['username'].test(data['username']),
        password: regExp['password'].test(data['password'])
    };

    var username = document.getElementById('login'),
        password = document.getElementById('password');

    if (checking['username']) {
        username.className = "fieldIsValid";
    } else if (data['username'] == '') {
        username.className = "field"
    } else {
        username.className = "fieldIsNotValid";
    }

    if (checking['password']) {
        password.className = "fieldIsValid";
    } else if (data['password'] == '') {
        password.className = "field"
    } else {
        password.className = "fieldIsNotValid";
    }

    result = checking['username'] && checking['password'];

    return result;
}