<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
setlocale(LC_MONETARY, 'en_US');
?>

<script>

    function deleteform(url, title) {
        bootbox.confirm({
            message: "Do you really want to delete <b>" + title + "</b> ?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    window.location.href = url;
                }
                console.log('This was logged in the callback: ' + result);
            }
        });
    }
</script>
<div class="widget widget-table action-table">

    <div class="widget-header"><i class="icon-tasks"></i>
        <h3>All users - <?= $data['rows']?></h3>
<!--        <a href="/users/form/" class="btn btn-medium btn-invert icon-plus-sign" alt="Create new user"-->
<!--           title="Create new user"></a>-->
    </div>

    <!-- /widget-header -->
    <div class="widget-content">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th><?= $this->helper->get_sort_link('first_name', 'Name') ?></th>
                <th><?= $this->helper->get_sort_link('email', 'Email') ?></th>
                <th><?= $this->helper->get_sort_link('input_income', 'Household Income') ?></th>
                <th><?= $this->helper->get_sort_link('input_payment', 'Down Payment') ?></th>
                <th class="td-actions"><?= $this->helper->get_sort_link('budget', 'Budget') ?></th>
                <th class="td-actions"><?= $this->helper->get_sort_link('test', 'Stress Test') ?></th>
                <th><?= $this->helper->get_sort_link( 'created_at', 'Datetime') ?></th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['users'] as $row):
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['first_name']." ".$row['last_name'] ?></td>
                    <td><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></td>
                    <td style="text-align:center">
                        <?=money_format('%10n', $row['input_income'])?>
                    </td>
                    <td style="text-align:center">
                        <?=money_format('%10n', $row['input_payment'])?>
                    </td>
                    <td style="text-align:center">
                     <b> <?=money_format('%10n', $row['budget'])?></b>
                    </td>

                    <td style="text-align:center">
                        <?=$row['test']."%"?>
                    </td>
                    <td style="text-align:center">
                        <?=$row['created_at']?>
                    </td>
                    <td style="text-align:center;">
                        <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteform('<?='/calculator/login/delete/'.$row['id']?>','<?= "#".$row['id']." - ".$row['first_name']." ".$row['last_name'] ?>'); return false">
                            <i class="icon-remove"></i> Remove
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?= $data['pagination']->render(); ?>
    <!-- /widget-content -->
</div>





