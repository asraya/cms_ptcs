<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorystockDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function historystock()
    {
        return $this->belongsTo(Historystock::class);
    }

}
