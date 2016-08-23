<?php
/**
 * Slince SmartQQ Library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\SmartQQ\Request;

use Cake\Utility\Hash;
use GuzzleHttp\Psr7\Response;
use Slince\SmartQQ\Exception\RuntimeException;
use Slince\SmartQQ\Model\Group;
use Slince\SmartQQ\UrlStore;

class GetGroupsRequest extends AbstractRequest
{
    protected $url = UrlStore::GET_GROUPS;

    protected $referer = UrlStore::GET_GROUPS_REFERER;

    protected $requestMethod = RequestInterface::REQUEST_METHOD_POST;

    /**
     * 解析响应数据
     * @param Response $response
     * @return Group[]
     */
    function parseResponse(Response $response)
    {
        $jsonData = \GuzzleHttp\json_decode($response->getBody(), true);
        if ($jsonData && $jsonData['retcode'] == 0) {
            $groups = [];
            $names = Hash::combine($jsonData['result']['gnamelist'], "{n}.gid", "{n}");
            $marknames = Hash::combine($jsonData['result']['gmarklist'], "{n}.uin", "{n}");
            foreach ($names as $groupData) {
                $groupData['markname'] = $marknames[$groupData['gid']];
                $groups[] = new Group($groupData);
            }
            return $groups;
        }
        throw new RuntimeException("Response Error");
    }
}