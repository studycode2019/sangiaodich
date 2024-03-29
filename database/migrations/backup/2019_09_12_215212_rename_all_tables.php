<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $from = array('BIENNHAN' , 'BIENNHAN_TRANGTHAI', 'DIEMDANH', 'KHACHHANG', 'KHOAHOC', 'LOPHOC', 'LOPHOC_DANHSACH', 'LOPHOC_NHATKY', 'NHANVIEN', 'NHATKY', 'PHIEUCHI', 'PHIEUTHU', 'PHIEUTHU_DANHMUC', 'TAIVE');
        $to = array('_case' , '_case_status', '_attendance', '_client', '_course', '_class', '_class_list', '_class_log', '_staff', '_case_log', '_payment', '_receipt', '_receipt_cate', '_download');
        for($i=0; $i<count($from); $i++) {
            Schema::rename($from[$i], $to[$i]);
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
