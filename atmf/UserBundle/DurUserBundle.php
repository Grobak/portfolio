<?php

namespace Dur\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DurUserBundle extends Bundle
{
  	public function getParent()
  	{
    	return 'FOSUserBundle';
  	}
}
