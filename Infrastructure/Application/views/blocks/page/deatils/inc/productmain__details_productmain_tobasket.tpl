<div class="tobasketFunction clear">
    [{oxhasrights ident="TOBASKET"}]
        [{if !$oDetailsProduct->isNotBuyable()}]
        <div class="input-group">
            <input id="amountToBasket" type="text" name="am" value="1" autocomplete="off" class="form-control">
            <div class="input-group-tweak">
                <button id="toBasket" type="submit" [{if !$blCanBuy}]disabled="disabled"[{/if}] class="btn btn-primary submitButton largeButton"><i class="fa fa-shopping-cart"></i> [{oxmultilang ident="TO_CART"}]</button>
            </div>
        </div>
        [{else}]
            <p class="shortdesc">[{oxmultilang ident="PB_CREATE_ARTICLE_ALERT_DESC"}]</p>
            [{if $articleAlertStatusMessage  && $articleAlertStatusMessageType }]
                [{assign var="messageTemplate" value="message/"|cat:$articleAlertStatusMessageType|cat:".tpl"}]
                [{include file=$messageTemplate statusMessage=$articleAlertStatusMessage}]
            [{/if}]
            <div class="input-group">
                <input type="hidden" name="fnc" value="addArticleAlert">
                <input style="width: 205px !important;" id="emailAddress" type="text" name="emailAddress" value="" placeholder="[{oxmultilang ident="EMAIL_ADDRESS"}]" autocomplete="off" class="form-control">
                <div class="input-group-tweak">
                    <button id="toBasket" type="submit" class="btn btn-primary submitButton largeButton"><i class="fa fa-envelope"></i> [{oxmultilang ident="PB_CREATE_ARTICLE_ALERT"}]</button>
                </div>
            </div>
        [{/if}]
    [{/oxhasrights}]
</div>
