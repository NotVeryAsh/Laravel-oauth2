<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order';

    protected $fillable = [
        'id',
        'order_number',
        'encrypted_id',
        'client_id',
        'payment_id',
        'date_ordered',
        'status',
        'last_updated',
        'date_sent',
        'report_status',
        'payment_status',
        'date_due',
        'S',
        'W',
        'P',
        'service_id',
        'order_total',
        'archived',
        'trash_id',
        'notes',
        'approved',
        'is_priority',
        'priority_price_increase',
        'priority_speed_increase',
        'account_id'
    ];
}
