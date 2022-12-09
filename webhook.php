<?php

require("B24LeadSender.php");
                
$restApiUrl = "https://pvh24.kubertron.net/rest/14/ut9skxgba8z1kdxw/crm.lead.add.json";
$userId = 14;

$leadSender = new \Sinyavsky\B24LeadSender($restApiUrl, $userId);

$leadSender->SetName($_POST["Name"]);
$leadSender->AddPhone($_POST["Phone"], "MOBILE");
$leadSender->SetOther("ADDRESS_CITY", $_POST["Gorod"]);

$leadSender->SetTitle("Новая заявка с сайта pvxlux.ru");

if ($leadSender->Send()) {
    echo "<p>Лид успешно отправлен.</p>";
} else { 
    echo "<p>При отправке лида возникла ошибка: {$leadSender->GetError()}</p>";
    /*
        echo "<pre>";
        print_r($leadSender->GetQueryData());
        echo "</pre>";
    */
}
?>