<?php
namespace alexrvs\slackbotlistener;

/**
 * Interface Transferable
 * @package alexrvs\slackbotlistener
 */

interface Transferable{

    /**
     * @return mixed
     */

    public function serialize();
}