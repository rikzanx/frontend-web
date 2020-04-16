<?php

namespace App\Http\Controllers\Traits;

trait FlashMessages
{
    public function flash($key, $message)
    {
        session()->flash($key, $message);
    }

    /*
    |--------------------------------------------------------------------------
    | FLASH SUCCESS
    |--------------------------------------------------------------------------
    */

    public function flashSuccessStore($message = 'Data successfull Created')
    {
        $this->flash('success', $message);
    }

    public function flashSuccessUpdate($message = 'Data successfull Updated')
    {
        $this->flash('info', $message);
    }

    public function flashSuccessDelete($message = 'Data successfull Deleted')
    {
        $this->flash('warning', $message);
    }

    /*
    |--------------------------------------------------------------------------
    | FLASH FAILED
    |--------------------------------------------------------------------------
    */

    public function flashFailedStore($exception = null, $message = 'Oops, Data tidak berhasil disimpan dengan error ')
    {
        $this->flash('danger', $message . $exception);
    }

    public function flashFailedUpdate($exception = null, $message = 'Oops, Data tidak berhasil diupdate dengan error ')
    {
        $this->flash('danger', $message . $exception);
    }

    public function flashFailedDelete($exception = null, $message = 'Oops, Data tidak berhasil dihapus dengan error ')
    {
        $this->flash('danger', $message . $exception);
    }
}
