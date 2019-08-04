<Html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>RTO Affordability Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/calculator/them/css/foundation.min.css" rel="stylesheet">
    <link href="/calculator/them/css/ssd-form.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <form
        method="post"
        action="/calculator/reviews/send"
        data-ajax-form
        data-success-behaviour="fadeOutShowMessage"
        novalidate
        id="customMessagesForm" style="margin-top:50px">
        <div class="form-row">
            <div id="kholmatov" class="form-group  col-sm-12 col-md-6">
                <label for="inputFirst">First Name</label>
                <label for="first_name">
                    <span data-validation="first_name">
                        <span data-case="required">Please provide your first name</span>
                        <span data-case="min">Length must be at least 2 characters</span>
                        <span data-case="response">Validation triggered by ajax response</span>
                    </span>
                </label>

                <input
                    type="text"
                    name="first_name"
                    id="first_name"
                    data-validate="required|min:2"
                    placeholder=""
                >
            </div>
            <div id="kholmatov" class="form-group col-sm-12 col-md-6">
                <label for="inputLast">Last Name</label>
                <label for="last_name">
                    <span data-validation="last_name">
                        <span data-case="required">Please provide your last name</span>
                        <span data-case="min">Length must be at least 2 characters</span>
                    </span>
                </label>

                <input
                    type="text"
                    name="last_name"
                    id="last_name"
                    data-validate="required|min:2"
                    placeholder=""
                >

            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail">Email *</label>
            <label for="email">
                <span data-validation="email">
                        <span data-case="required">Please provide your email address</span>
                        <span data-case="email">Invalid email address</span>
                    </span>
            </label>

            <input
                type="email"
                name="email"
                id="email"
                data-validate="required|email"
                placeholder=""
            >
        </div>

        <div class="form-row">
            <div id="kholmatov" class="form-group col-md-6 col-sm-12">
                <label for="inputIncome">Household Income</label>
                <label for="input_income">
                    <span data-validation="input_income">
                        <span data-case="required">Please provide your household income</span>
                    </span>
                </label>

                <input
                    type="number"
                    name="input_income"
                    id="input_income"
                    data-validate="required"
                    placeholder=""
                >

            </div>
            <div id="kholmatov" class="form-group col-md-6 col-sm-12">
                <label for="inputPayment">Down Payment</label>
                <label for="input_payment">
                    <span data-validation="input_payment">
                        <span data-case="required">Please provide your down payment</span>
                    </span>
                </label>

                <input
                    type="number"
                    name="input_payment"
                    id="input_payment"
                    data-validate="required"
                    placeholder=""
                >

            </div>
        </div>

        <button type="submit"
                data-submit-trigger
                class="btn btn-primary">CALCULATE
        </button>

        <div class="form-row">
            <div class="form-group col-md-12 col-sm-12" id="result" style="display:none;margin-top:20px;">
                <p class="h4">YOUR BUDGET IS: $<span id="budget">0</span></p>
            </div>
        </div>
    </form>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/calculator/them/js/jquery.ssd-form.js"></script>
<script>
    $(function () {
        if ($('.form-group').width() <= 400) {
            $('.container #kholmatov').removeClass("col-md-6");
        } else {
            $('.container #kholmatov').addClass("col-md-6");
        }


        $('form[data-ajax-form]').ssdForm({
            actionMethod: function (form, form_model, success, error) {
                var total = parseFloat($('#input_income').val()) + parseFloat($('#input_income').val()) / 100 *<?=$data['fields']['test']?> +parseFloat($('#input_payment').val());
                $('#budget').text(parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#result').show();


                var formData = $("#customMessagesForm").serializeArray();
                var URL = $("#customMessagesForm").attr("action");
                $.post(URL,
                    formData,
                    function (data, textStatus, jqXHR) {
                        $('#first_name').val("");
                        $('#last_name').val("");
                        $('#email').val("");
                        $('#input_income').val("");
                        $('#input_payment').val("");
                        console.log("Ajax Work!!!");
                    }).fail(function (jqXHR, textStatus, errorThrown) {

                });

                form.endRequest(form_model);
            }
        });
    });
</script>


</body>
</Html>