<?php

namespace App\Http\Services;

use App\Http\Models\BillboardModel;

class BillboardService
{
    /**
     * 取所有公告清單
     */
    public function getBillboardList()
    {
        return BillboardModel::get()->toArray();
    }

    /**
     * 格式化 公告for 公告清單
     *
     * @param $billboardList
     *
     * @return mixed
     */
    public function formatBillboardList($billboardList)
    {
        if (empty($billboardList)) {
            return $billboardList;
        }
        foreach ($billboardList as $key => $billboard) {
            $billboardList[$key]['content'] = substr($billboard['content'], 0, 50) . "  ...以下省略";
        }
        return $billboardList;
    }
}