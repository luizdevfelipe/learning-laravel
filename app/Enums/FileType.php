<?php

namespace App\Enums;

enum FileType: string 
{
    case Receipt = 'receipt';
    case Statement = 'statement';
}
