<?php

declare(strict_types=1);

use AirtonZanon\SculpinContentfulBundle\SculpinContentfulBundle;
use Sculpin\Bundle\SculpinBundle\HttpKernel\AbstractKernel;


class SculpinKernel extends AbstractKernel
{
    protected function getAdditionalSculpinBundles(): array
    {
        return [
            SculpinContentfulBundle::class,
        ];
    }
}
