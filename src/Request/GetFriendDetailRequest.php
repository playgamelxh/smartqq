<?php
/**
 * Slince SmartQQ Library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\SmartQQ\Request;

use GuzzleHttp\Psr7\Response;
use Slince\SmartQQ\Exception\RuntimeException;
use Slince\SmartQQ\Model\Birthday;
use Slince\SmartQQ\Model\Profile;
use Slince\SmartQQ\UrlStore;

class GetFriendDetailRequest extends AbstractRequest
{
    protected $url = UrlStore::GET_FRIEND_DETAIL;

    protected $referer = UrlStore::GET_FRIEND_DETAIL_REFERER;

    function __construct($uin)
    {
        return str_replace('{uin}', $uin, $this->url);
    }

    /**
     * 解析响应数据
     * @param Response $response
     * @return Profile
     */
    function parseResponse(Response $response)
    {
        $jsonData = \GuzzleHttp\json_decode($response->getBody(), true);
        if ($jsonData && $jsonData['retcode'] == 0) {
            $profile = new Profile($jsonData['result']);
            $profile->birthday = new Birthday($profile->birthday);
            return $profile;
        }
        throw new RuntimeException("Response Error");
    }
}