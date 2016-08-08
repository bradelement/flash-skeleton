<?php
namespace App\View;

class ApiView extends BaseApiView
{
    protected $errorMap = array(
        'TEST_ERROR' => [-1, 'error is %s'],
    );
}
