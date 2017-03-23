<?php

namespace alexrvs\slackbotlistener\Handlers;

use alexrvs\slackbotlistener\SlackBotRequest;

/**
 * Interface RequestHandler
 * @package alexrvs\slackbotlistener\Handlers
 */

interface RequestHandler{

    public function call(SlackBotRequest $request);


}