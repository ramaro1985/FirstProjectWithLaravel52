var postId = 0;
var postBodyElement = null;
/*
 *
 * -------------Funsiones de JS utiles para todos----
 */
function createPopover(elem, title, text, placement) {
    elem.attr('data-toggle', 'popover');
    elem.attr('title', title);
    elem.attr('data-content', text);
    elem.attr('data-placement', placement);
    jQuery('[data-toggle="popover"]').popover();
    elem.trigger('click');
    elem.focus();
}
function checkLength(o, min, max) {
    if (o.val().length < min) {
        createPopover(o, 'Check this field', 'Minimum of characters is:' + min, 'right');
        return false;
    }
    else if (o.val().length > max) {
        createPopover(o, 'Check this field', 'Maximun of characters is:' + max, 'right');
        return false;
    }
    else {
        return true;
    }
}
function checkSelected(o) {
    if (o.val() == 0) {
        createPopover(o, 'Check this field', 'Please fill out this field');
        return false;
    } else {
        return true;
    }
}

function checkIsNum(o) {
    num = o.val();
    if (isNaN(num)) {
        createPopover(o, 'Check this field', 'This is not a number');
        return false;
    } else {
        return true;
    }
}
function disableForm(formulario) {
    formulario.find('input ,button, textarea,select').attr('disabled', 'disabled');
    formulario.css("opacity", 0.37);
    //formulario.removeClass("hide");
    //formulario.addClass("hide");
}
function resetForm(formulario) {
    formulario.find('input, textarea,select').val('');
}
function enableForm(formulario) {
    formulario.find('input , button, textarea,select').removeAttr('disabled')
    formulario.css("opacity", 1);
}
function checkRegexp(o, regexp) {
    if (!( regexp.test(o.val()) )) {
        createPopover(o, 'Check this field', 'Invalid field');
        return false;
    } else {
        return true;
    }
}
function checkPassword(o, c) {
    if (o.val() != c.val()) {
        createPopover(c, 'Check this field', 'Different passwords');
        return false;
    } else {
        return true;
    }
}
/*
 *
 * -------------Funsiones de JS utiles para todos----
 */
function ChangeDropDownValue(element) {
    jQuery(element).parents(".dropdown").find(".dropdown-toggle").find("small").text(jQuery(element).text());
}
