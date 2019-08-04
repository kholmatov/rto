<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
?>

<div class="widget">

    <div class="widget-header"><i class="icon-tasks"></i>
        <h3> <a href="/calculator/login/">Users list</a><i class="icon-chevron-right"></i> <span id="title"><? ?></span></h3>

    </div>

    <!-- /widget-header -->
    <div class="widget-content">

        <div id="form-show">
            <form id="task-form" name="taskform" class="form-horizontal" method="post"  action="/calculator/login/create/">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="username">Username:</label>
                        <div class="controls">
                            <input type="text" class="span4 request" name="username" id="username"  value="<?= $data['fields']['username'] ?>">
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->
                    <div class="control-group">
                        <label class="control-label" for="email">Email:</label>
                        <div class="controls">
                            <input type="text" class="span4 request" id="email" name="email"  value="<?= $data['fields']['email'] ?>">
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="test">Stress Test:</label>
                        <div class="controls">
                            <input type="text" class="span4 request" id="test" name="test"  value="<?= $data['fields']['test'] ?>">
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="password">Password:</label>
                        <div class="controls">
                            <input type="password" class="span4" id="password" name="password"  value="">
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->


                    <div class="form-actions">
                        <?php if($this->helper->is_admin() && $data['fields']['id']):?>
                            <button type="submit" class="btn btn-primary" onclick="updateform(); return false">Update</button>
<!--                            <button class="btn btn-danger"data-bb-example-key="confirm-options" onclick="deleteform(); return false">Удалить</button>-->
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary" onclick="saveform(); return false">Save</button>
                        <?php endif ?>
                        <a href="/calculator/login/" class="btn btn-invert">Cancel</a>

                    </div> <!-- /form-actions -->
                    <input type="hidden" name="id" id="id" value="<?= $data['fields']['id']?>">
                </fieldset>
            </form>
        </div>

        <div id="prev-show" class="form-horizontal">

            <p><strong>Status:</strong> <span id="prv-status"></span></p>
            <p><strong>Name:</strong> <span id="prv-name"></span></p>
            <p><strong>Email:</strong> <span id="prv-email"></span></p>
            <p><strong>Test:</strong> <span id="prv-test"></span></p>
            <p><img id="prv-image" src=""></p>
            <div class="clearfix"></div>
            <div class="form-actions">
                <?php if($this->helper->is_admin() && $data['fields']['id']):?>
                    <button type="submit" class="btn btn-primary" onclick="updateform(); return false">Update</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" onclick="saveform(); return false">Save</button>
                <?php endif ?>
                <button type="button" class="btn btn-default" onclick="editform(); return false">Edit</button>
            </div>
        </div>

    </div>
</div>

<?php $rmUrl = '/home/delete/'.$data['fields']['id'] ?>
<style>
    input[type="file"] {
        padding: 4px;
    }
    .input-error{
        border:1px solid #f00;
        -webkit-box-shadow: 0px 0px 5px 1px rgba(245,10,57,1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(245,10,57,1);
        box-shadow: 0px 0px 5px 1px rgba(245,10,57,1);
    }
    #prev-show{
        display:none;
    }

</style>

<script>
    $(document).ready(function () {
        $(".request").focus(function () {
            $(this).removeClass('input-error');
        });
    });

    function preview(){
        if(validation()) {
            $('#form-show').hide();
            $('#prev-show').show();
            $('#title').text("Preview task");
            if($('#status').is(":checked")){
                html = '<i class="btn-icon-only icon-ok"> </i>';
            }else{
                html = '<i class="btn-icon-only icon-remove"> </i>';
            }
            $('#prv-status').html(html);
            $('#prv-name').text($('#name').val());
            $('#prv-email').text($('#email').val());
            $('#prv-task').text($('textarea#tasks').val());
            $('#prv-image').attr('src', $('#image-src').attr('src'));

        }
    }

    function editform() {
        $('#prev-show').hide();
        $('#form-show').show();
        $('#title').text("Создать новую задачу");
    }

    function saveform(){
        if(validation()){
            $('#task-form').submit();
        }
    }

    function deleteform(){
        var id = $('#id').val();
        bootbox.confirm({
            message: "Вы действительно хотите удалить  <?= $data['fields']['username']?>?",
            buttons: {
                confirm: {
                    label: 'Да',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Нет',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    window.location.href = "<?= $rmUrl ?>";
                }
                console.log('This was logged in the callback: ' + result);
            }
        });
    }

    function updateform(){
        if(validation()){
            $('#task-form').submit();
        }
    }



    function validation(){
        var check = true;
        var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        $('#task-form .request').each(function(e) {
            if($(this).val() == '') {
                check = false;
                $(this).addClass('input-error');
            }
        });

        if(!filter.test($('#task-form #email').val())){
            $('#task-form #email').addClass('input-error');
            check = false;
        }
        return check;
    }
</script>