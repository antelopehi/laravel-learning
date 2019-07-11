<?php

namespace App\Http\Services;

use App\Http\Models\BillboardModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delBillboardById(int $id)
    {
        $delRow = BillboardModel::where('id', $id)->delete();
        if ($delRow) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 設定 alert 資訊
     *
     * @param Request $request
     * @param string  $msg
     * @param string  $alertType
     */
    public function setMsg(Request $request, string $msg, string $alertType = 'alert-secondary')
    {
        $request->session()->flash('msg', $msg);
        $request->session()->flash('alertType', $alertType);
    }

    /**
     * 建立 公告
     *
     * @param $title
     * @param $content
     *
     * @return bool
     */
    public function createBillboard($title, $content)
    {
        $data = (compact('title', 'content'));
        $id   = BillboardModel::insertGetId($data);
        if ($id) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * 將查詢資料送到 flash old
     *
     * @param $request
     * @param $id
     */
    public function flashOldData($request, $id)
    {
        $billboard = BillboardModel::find($id)->toArray();
        if (!empty($billboard)) {
            $request->session()->put('_old_input.content', $billboard['content']);
            $request->session()->put('_old_input.title', $billboard['title']);
        }
    }
}