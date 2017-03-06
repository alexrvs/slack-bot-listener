<?php

namespace alexandervas\slackbotlistener\Handlers;

use alexandervas\slackbotlistener\SlackBotRequest;

interface RequestHandler{

    public function call(SlackBotRequest $request);

}