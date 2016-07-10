<? if (!is_null($_SESSION['view_vars']->message)) : ?>
    <div class="row">
        <div id="error_message" name="error_message" class="form_message white-text col no-float s10 margin-auto center-align hvr-buzz-out-stay"><i class="inherit-font-size material-icons">error_outline</i><?= $_SESSION['view_vars']->message ?></div>
    </div>
<? else: ?>

    <? if (isset($_SESSION['view_vars']->data->username)) : ?>

        <div class="row">
            <div class="col s12">
                <div class="center promo promo-example">
                    <div class="col s4 offset-s4 padding5 row">
                        <div class="col s12">
                            <div class="center promo promo-example">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;" data-field="username">username</th>
                                            <th style="text-align: center;" data-field="is_online">is online?</th>
                                            <th style="text-align: center;" data-field="begin_chat">begin chat</th>
                                        </tr>
                                    </thead>
                                    <? if ($_SESSION['view_vars']->data->is_online) : ?>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;"><?= $_SESSION['view_vars']->data->username ?></td>
                                                <td style="text-align: center;"><i class="s4 small material-icons moss emerald-text icon">thumb_up</i></td>
                                                <td style="text-align: center;"><a href="/chat/new_chat"><i class="s4 small material-icons moss emerald-text icon">chat</i></a></td>
                                            </tr>
                                        </tbody>
                                    <? else: ?>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;"><?= $_SESSION['view_vars']->data->username ?></td>
                                                <td style="text-align: center;"><i class="s4 small material-icons moss emerald-text icon">thumb_down</i></td>
                                                <td style="text-align: center;"><a href="/chat/new_chat"><i class="s4 small material-icons moss emerald-text icon">chat</i></a></td>
                                            </tr>
                                        </tbody>
                                    <? endif; ?>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? endif; ?>
<? endif; ?>

