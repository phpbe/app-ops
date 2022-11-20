<?php
namespace Be\App\Ops\Task;

use Be\Be;
use Be\Task\TaskInterval;

/**
 * @BeTask("阿里云CDN证书", schedule="20 * * * *")
 */
class AliyunCdnSsl extends TaskInterval
{
    // 时间间隔：30天
    protected $step = 86400 * 30;

    public function execute()
    {
        $d = date('Y-m-d H:i:s', time() + $this->step);
        $service = Be::getService('App.Cms.Admin.TaskAliyunCdnSsl');
        $db = Be::getDb();
        $sql = 'SELECT * FROM ops_aliyun_cdn_ssl WHERE expire_time <= ?';
        $objects = $db->getbjects($sql, [$d]);

        if (count($objects) > 0) {
            foreach ($objects as $object) {
                $service->updateSsl($object);
            }
        }
    }

}
