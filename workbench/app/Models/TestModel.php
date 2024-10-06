<?php

namespace Workbench\App\Models;

use HadiAghandeh\FriendlyId\Traits\FriendlyId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;
    use FriendlyId;
}
