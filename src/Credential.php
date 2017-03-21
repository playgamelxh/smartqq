<?php
/**
 * SmartQQ Library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\SmartQQ;

class Credential
{
    /**
     * 鉴权参数ptwebqq，存储在cookie中
     * @var string
     */
    protected $ptWebQQ;

    /**
     * 鉴权参数vfwebqq
     * @var string
     */
    protected $vfWebQQ;

    /**
     * 鉴权参数pSessionId
     * @var string
     */
    protected $pSessionId;

    /**
     * 客户端id
     * @var int
     */
    protected $clientId = 5399199;

    /**
     * 当前登录的用户编号（o+QQ号）
     * @var string
     */
    protected $uin;

    /**
     * @return string
     */
    public function getPtWebQQ()
    {
        return $this->ptWebQQ;
    }

    /**
     * @param string $ptWebQQ
     */
    public function setPtWebQQ($ptWebQQ)
    {
        $this->ptWebQQ = $ptWebQQ;
    }

    /**
     * @return string
     */
    public function getVfWebQQ()
    {
        return $this->vfWebQQ;
    }

    /**
     * @param string $vfWebQQ
     */
    public function setVfWebQQ($vfWebQQ)
    {
        $this->vfWebQQ = $vfWebQQ;
    }

    /**
     * @return string
     */
    public function getPSessionId()
    {
        return $this->pSessionId;
    }

    /**
     * @param string $pSessionId
     */
    public function setPSessionId($pSessionId)
    {
        $this->pSessionId = $pSessionId;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getUin()
    {
        return $this->uin;
    }

    /**
     * @param string $uin
     */
    public function setUin($uin)
    {
        $this->uin = $uin;
    }
}