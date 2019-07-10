<?php

namespace App\Http\Controllers;

use App\Http\Services\BillboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BillboardController extends Controller
{

    protected $service;

    public function __construct()
    {
        $this->service = new BillboardService();
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //抓清單
        $billboardList = $this->service->getBillboardList();
        //格式化內容
        $billboardList = $this->service->formatBillboardList($billboardList);
        $data          = compact('billboardList');
        return view('billboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $isDel = $this->service->delBillboardById($id);
        if ($isDel) {
            $msg       = "成功";
            $alertType = "alert-success";
            $this->service->setMsg($request, $msg, $alertType);
        } else {
            $msg       = "刪除失敗";
            $alertType = "alert-danger";
            $this->service->setMsg($request, $msg, $alertType);
        }
        return redirect('/billboard');
    }
}
