<?php

namespace alexrvs\slackbotlistener\Handlers;

use alexrvs\slackbotlistener\SlackBotRequest;

interface RequestHandler{

    public function call(SlackBotRequest $request);

}