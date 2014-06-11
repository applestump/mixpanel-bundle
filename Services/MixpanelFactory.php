<?php

namespace Applestump\MixpanelBundle\Services;
//Mixpanel PHP client isn't namespaced. :-(

/**
 * Class MixpanelFactory
 * @package Applestump\MixpanelBundle\Services
 */
class MixpanelFactory
{

    protected $token;

    /**
     * @param $token Your mixpanel token.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Returns a singleton instance of Mixpanel
     * @return Mixpanel
     */
    public function get()
    {
        return \Mixpanel::getInstance($this->token);
    }

} 