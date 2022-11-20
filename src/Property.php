<?php

namespace Be\App\Ops;


class Property extends \Be\App\Property
{

    protected string $label = 'OPS';
    protected string $icon = 'bi-repeat';
    protected string $description = '自动化运维';

    public function __construct() {
        parent::__construct(__FILE__);
    }

}
