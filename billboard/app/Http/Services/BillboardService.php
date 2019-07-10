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
}