<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYeYfKOP\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYeYfKOP/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerYeYfKOP.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerYeYfKOP\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerYeYfKOP\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'YeYfKOP',
    'container.build_id' => '40e6ca29',
    'container.build_time' => 1565361425,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerYeYfKOP');
