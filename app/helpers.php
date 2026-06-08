<?php

function isActiveSidebar($path)
{
    return request()->routeIs($path)
        ? 'bg-neutral-tertiary text-cyan-600'
        : 'text-neutral-tertiary hover:bg-gray-200 hover:text-cyan-600';
}

function isActiveNavbar($routeName, $params = [])
{
    if (!request()->routeIs($routeName)) {
        return 'text-body rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0';
    }

    foreach ($params as $key => $value) {
        $param = request()->route($key);

        // kalau hasil binding object (Major)
        if (is_object($param) && isset($param->slug)) {
            if ($param->slug !== $value) {
                return 'text-body rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0';
            }
        }
        // kalau bukan object
        elseif ($param != $value) {
            return 'text-body rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0';
        }
    }

    return 'text-white bg-sky-600 rounded md:bg-transparent md:text-sky-600 md:p-0';
}

function isActiveHamburgerMenu($routeName, $params = [])
{
    if (!request()->routeIs($routeName)) {
        return 'text-gray-600';
    }

    foreach ($params as $key => $value) {
        $param = request()->route($key);

        // kalau hasil binding object (Major)
        if (is_object($param) && isset($param->slug)) {
            if ($param->slug !== $value) {
                return 'text-gray-600';
            }
        }
        // kalau bukan object
        elseif ($param != $value) {
            return 'text-gray-600';
        }
    }

    return 'bg-sky-50 text-sky-600 font-bold';
}



function CalendarCategoryColor(string $category): string
{
    return match ($category) {
        'akademik' => 'bg-brand text-white',
        'kegiatan' => 'bg-green-500 text-white',
        'ujian' => 'bg-red-500 text-white',
        'libur' => 'bg-yellow-500 text-white',
        default => 'bg-gray-500 text-white',
    };
}

function errorBorder(string $field): string
{
    $errors = session('errors');
    return $errors && $errors->has($field)
        ? 'bg-red-50 border-red-100 focus:border-red-300 focus:ring-red-300'
        : 'border-default-medium';
}