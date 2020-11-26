<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorystockDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Stationary::class);
    }

    public function historystock()
    {
        return $this->belongsTo(Historystock::class);
    }
    
    public function generalrequest()
{
    return $this->belongsTo(GeneralRequest::class);

}
    public function user()
    {
        return $this->belongsTo(Historystock::class);
    }
}
