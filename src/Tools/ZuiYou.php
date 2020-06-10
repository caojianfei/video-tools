<?php
declare (strict_types=1);

namespace Smalls\VideoTools\Tools;

use Smalls\VideoTools\Exception\ErrorVideoException;
use Smalls\VideoTools\Interfaces\IVideo;
use Smalls\VideoTools\Logic\ZuiYouLogic;

/**
 * Created By 1
 * Author：smalls
 * Email：smalls0098@gmail.com
 * Date：2020/4/27 - 14:32
 **/
class ZuiYou extends Base implements IVideo
{

    /**
     * 更新时间：2020/6/10
     * @param string $url
     * @return array
     * @throws ErrorVideoException
     */
    public function start(string $url): array
    {
        $this->logic = new ZuiYouLogic($url, $this->urlValidator->get('zuiyou'), $this->config);
        $this->logic->checkUrlHasTrue();
        $this->logic->setPId();
        $this->logic->setContents();
        $this->logic->parseId();
        return $this->exportData();
    }

}