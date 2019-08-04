$(function () {
    // Fix line indenting in code snippets
    $('pre code').each(function () {
        var lines = $(this).text().split('\n');
        var indent = 2;
        var line1Indent = lines[1].match(/^\s+/);
        if (lines.length > 3) {
            for (var i = 1; i < lines.length; i++) {
                var lineIndent = lines[i].match(/^\s+/);
                if (lineIndent != null) {
                    if (lineIndent[0].length != line1Indent[0].length) {
                        indent = lineIndent[0].length - line1Indent[0].length;
                        break;
                    }
                }
            }
        }
        lines = lines.map(function (line) {
            return line.substring(line1Indent[0].length - indent, line.length);
        });
        $(this).text(lines.join('\n'));
    });

    // Basic Example
    $('#simpleForm').bsValidate({
        success: function (e) {
            e.preventDefault();
            alert('Success!');
        }
    });

    var customMessagesForm = $('#customMessagesForm');

    // Custom Messages
    customMessagesForm.bsValidate({
        fields: {
            first: {
                required: {
                    helpText: "Please enter your First Name.",
                    alert: "You are required to enter your First Name."
                }
            },
            last: {
                required: {
                    helpText: "Please enter your Last Name.",
                    alert: "You are required to enter your Last Name."
                }
            },
            income: {
                required: {
                    helpText: "Please enter your Household Income.",
                    alert: "You are required to enter your Household Income."
                }
            },
            payment: {
                required: {
                    helpText: "Please enter your Down Payment.",
                    alert: "You are required to enter your Down Payment."
                }
            },
            email: {
                required: {
                    helpText: "Please enter your email.",
                    alert: "You are required to enter your email."
                },
                email: {
                    helpText: "This doesn't look like a valid email.",
                    alert: "Please enter a valid email address."
                }
            },
            emailConfirm: {
                required: {
                    helpText: "Please confirm your email.",
                    alert: "You are required to confirm your email.",
                    dependency: {
                        isNotBlank: 'email'
                    }
                },
                match: {
                    field: "email",
                    helpText: "Oops. That doesn't match!",
                    alert: "It doesn't look like the two email addresses match."
                }
            },
            website: {
                regex: {
                    pattern: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/g,
                    helpText: "This doesn't look like a real URL",
                    alert: "Please enter an actual website address."
                }
            }
        },
        before: function () {
            customMessagesForm.find('.alert').remove();
        },
        success: function (e) {
            e.preventDefault();
            //var butget = $('#inputIncome').val()+$('#inputIncome').val()/100*5.5+$('#inputPayment').val();
            //$('#result').val(butget);
        }
    });

});