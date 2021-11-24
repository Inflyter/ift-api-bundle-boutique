<?php

namespace Inflyter\BoutiqueBundle\Model\Shop;

/*
 * use the interface in the bundle which is then replaced by the entity in the actual app
 * https://symfony.com/doc/current/doctrine/resolve_target_entity.html
 *
 * NOT USED - BUT A GOOD EXAMPLE
 * EXTENDED THE CORE CATEGORY WITH NEW FIELDS INSTEAD
 */

interface CategoryInterface
{
    public function getId(): int;
}
