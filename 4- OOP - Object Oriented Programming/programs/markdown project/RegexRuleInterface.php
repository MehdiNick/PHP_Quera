<?php
require("./RuleInterface.php");
interface RegexRuleInterface extends RuleInterface
{
    public function rule();
}
