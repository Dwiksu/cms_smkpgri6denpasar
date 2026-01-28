<?php

function isActiveSidebar($path) {
    return request()->routeIs($path)
        ? 'bg-neutral-tertiary text-cyan-600'
        : 'text-neutral-tertiary hover:bg-gray-200 hover:text-cyan-600';
}