<?php

/**
 * Class Coub
 */
class Coub implements \SplSubject{

    /**
     * @var string $apiUrl
     */
    private $apiUrl;

    /**
     * @var \SplObjectStorage $counb
     */
    private $coubs;

    public function __construct($api)
    {
        $this->apiUrl = $api;
    }

    public function attach(SplObserver $observer)
    {
        $this->coubs->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->coubs->detach($observer);
    }

    public function notify()
    {
        // TODO: Implement notify() method.
    }

}