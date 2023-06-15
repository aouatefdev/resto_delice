<?php

namespace App;

use Vich\UploaderBundle\VichUploaderBundle;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;

class Kernel extends BaseKernel
{   
    use MicroKernelTrait;
       
}
