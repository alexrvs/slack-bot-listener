<?php
namespace alexandervas\slackbotlistener;

/**
 * Interface Transferable
 * @package alexandervas\slackbotlistener
 */

interface Transferable{

    /**
     * @return mixed
     */

    public function serialize();
}