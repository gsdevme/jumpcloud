<?php

namespace JumpCloud\Model;

class System
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $hostname;

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var string
     */
    private $remoteIP;

    /**
     * @var array
     */
    private $networkInterfaces;

    /**
     * @var bool
     */
    private $active;

    public static function createFromApi($data)
    {
        $system = new self();

        $system->setId($data->id);
        $system->setHostname($data->hostname);
        $system->setDisplayName($data->displayName);
        $system->setRemoteIP($data->remoteIP);
        $system->setActive((bool)$data->active);
        $system->setNetworkInterfaces((array)$data->networkInterfaces);

        return $system;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getRemoteIP()
    {
        return $this->remoteIP;
    }

    /**
     * @param string $remoteIP
     */
    public function setRemoteIP($remoteIP)
    {
        $this->remoteIP = $remoteIP;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return array
     */
    public function getNetworkInterfaces()
    {
        return $this->networkInterfaces;
    }

    /**
     * @param array $networkInterfaces
     */
    public function setNetworkInterfaces($networkInterfaces)
    {
        $this->networkInterfaces = $networkInterfaces;
    }
}
