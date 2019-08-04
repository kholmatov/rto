<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */

?>

<div class="widget">

    <div class="widget-header"><i class="icon-tasks"></i>
        <h3>Sign in</h3>
<!--        <a href="./" class="btn btn-invert pull-right" style="margin:6px 5px">Back<i class="icon-share-alt"></i></a>-->
    </div>

    <!-- /widget-header -->
    <div class="widget-content">

        <div class="content clearfix">
            <?php if ($this->helper->getPost()): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>Alert!</h4>
                    Wrong login or password!
                </div>
            <?php endif ?>
            <form action="/calculator/login/" method="post">

                <div class="login-fields">
                    <div class="field">
                        <label for="login">Login:</label>
                        <input type="text" id="login" name="login" value="" placeholder="Login" class="login login-field" />
                    </div> <!-- /field -->

                    <div class="field">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                    </div> <!-- /password -->

                </div> <!-- /login-fields -->

                <div class="login-actions">


                    <button class="button btn btn-success btn-large">Submit</button>

                </div> <!-- .actions -->



            </form>

        </div> <!-- /content -->


    </div>
</div>
