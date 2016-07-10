<? if (isset($_SESSION['view_vars'])) : ?>
    <div class="row">
        <div class="col s12">
            <div class="center promo promo-example">
                <div class="col s4 offset-s4 padding5 row">
                    <div class="col s12">
                        <div class="center promo promo-example">
                            <table>
                                <tbody>
                                    <? for ($x = 0; $x <= $_SESSION['view_vars']['row_count']; $x++) :?>
                                        <tr class="flow-text">
                                            <td style="text-align: center;"><?= $_SESSION['view_vars'][$x] ?></td>
                                            <td style="text-align: center;"><a href="logout"><i class="s4 small material-icons moss emerald-text icon">chat</i></a></td>
                                        </tr>
                                    <? endfor; ?>
                                </tbody>        
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>
