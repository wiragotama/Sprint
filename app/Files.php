<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['filename', 'filePath', 'uploaderContact', 'agentContact', 'uploaderName', 'agentName', 'deliveryAddress', 'printType', 'paperSize', 'numPages', 'harga', 'status'];
}
