function ajaxform(form, url) {
    var $form = $(form);

    $.post(form.action, $form.serialize(), function(data) {
        if((data.error == '用户不存在')||(data.error == '密码错误')){
            layer.alert(data.error);
            setTimeout(
                function(){location.href = 'http://www.hsjshop.com/Home/User/login';},
                2000
            );
        }else if(data.error) {
            layer.alert(data.error);
        } else {
            location.href = url;
        }
    }, 'json');

    return false;
}

function ajaxcomment(form) {
    var $form = $(form);

    $.post(form.action, $form.serialize(), function(data) {
        if(data.error) {
            layer.alert(data.error);
        } else {
            location.reload();
        }
    }, 'json');

    return false;
}

function ajaxcomment2() {
    var $form = $(form);

    $.post(form.action, $form.serialize(), function(data) {
        if(data.error) {
            layer.alert(data.error);
        } else {
            location.reload();
        }
    }, 'json');

    return false;
}