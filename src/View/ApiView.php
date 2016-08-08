<?php
namespace App\View;

class ApiView extends BaseApiView
{
    protected $errorMap = array(
        'INPUT_ERROR' => [-1, '%s'],
    );
}
